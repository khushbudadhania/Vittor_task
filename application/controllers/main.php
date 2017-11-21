<?php

class Main extends CI_Controller
{
    public $date;
    public $valid_formats = array();
    public $max_size;
    public $user_id;

    public function __construct()
    {

        parent::__construct();
        $this->load->model(array('main_model'));
        $this->load->helper('form');
        $this->load->helper('html');
        date_default_timezone_set('Asia/kolkata');
        $this->date = date('Y-m-d h:m:s');
        $this->valid_formats = array("gif", "jpg", "jpeg", "png", "JPEG", "JPG", "PNG");
        $this->max_size = '5000';
        $this->user_id = $this->session->userdata('user_id');
    }

    public function index()
    {
        $this->load->view('index');
    }

    public function check_session()
    {
        $session = $this->session->userdata('user_id');
        if(!($session)){
            redirect('/login');
        } else return true;
    }

    public function not_found()
    {
        $this->load->view('404');
    }


    public function submitRegistrationForm()
    {
        $actual_image_name = '';
        $firstName = $this->input->post('firstName');
        $lastName = $this->input->post('lastName');
        $username = $this->input->post('username');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $gender = $this->input->post('gender');
        $birthDate = $this->input->post('birthDate');
        $mobileNumber = $this->input->post('mobileNumber');
        $photo = $_FILES['photo'];

        $this->check_email_exist($email);

        if($photo['name'] != ''){
            $actual_image_name = $this->upload_image($photo);
        }

        $register_data = array(
            'firstName' => $firstName,
            'lastName' => $lastName,
            'username' => $username,
            'email' => $email,
            'password' => md5($password),
            'gender' => $gender,
            'birthDate' => $birthDate,
            'mobileNumber' => $mobileNumber,
            'user_photo' => $actual_image_name,
            'added_date' => $this->date
        );
        $is_success = $this->main_model->insert_data('register',$register_data);
        if($is_success){
            $this->set_response('success','Registration Successfully Done');
        } else {
            $this->set_response('error','Registration Failed. Please try again!');
        }

    }

    public function check_email_exist($email) {
        $is_success = $this->main_model->check_exists('register',array('email' => $email));
        if($is_success){
            $msg = 'This email already exists';
        }
        if(!empty($msg)){
            $this->set_response('error',$msg);
        }
    }

    public function upload_image($photo){
        $bl = "./assets/uploads/user/";

        if (!is_dir($bl."thumb")) {
            mkdir("./assets/uploads/user/" ."thumb", 0777, TRUE);
        }

        $filename = stripslashes($photo['name']);
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $actual_image_name = time().rand().".".$ext;
        $uploaddir = "./assets/uploads/user/"; //a directory inside
        $size = filesize($photo['tmp_name']);
        $ext = strtolower($ext);

        $this->validate_upload_image($ext,$size);

        $newname = $uploaddir . $actual_image_name;
        if (move_uploaded_file($photo['tmp_name'], $newname)) {
            $image_config["image_library"] = "gd2";
            $image_config["source_image"] = $newname;
            $image_config['create_thumb'] = FALSE;
            $image_config['maintain_ratio'] = FALSE;
            $image_config['new_image'] = "./assets/uploads/user/thumb/";
            $image_config['quality'] = "100%";
            $image_config['width'] = "200";
            $image_config['height'] = "200";
            $this->load->library('image_lib');
            $this->image_lib->initialize($image_config);
            if (!$this->image_lib->resize()) { //Resize image
                $msg = 'Failed to resize your image..!';
            }
        } else {
            $msg = 'You have exceeded the size limit! so moving unsuccessful!';
        }

        if(!empty($msg)){
            $this->set_response('error',$msg);
        } else {
            return $actual_image_name;
        }

    }

    public function validate_upload_image($ext,$size) {
        if (!in_array($ext, $this->valid_formats)) {
            $msg = 'Unknown extension!';
        } else if($size > ($this->max_size * 1000)){
            $msg = 'You have exceeded the size limit!';
        }

        if(!empty($msg)){
            $this->set_response('error',$msg);
        }
    }

    public function set_response($status,$msg) {
        $json = array('status' => $status,'message'=> $msg);
        echo json_encode($json); exit;
    }

    public function login() {
        $this->load->view('login');
    }

    public function loginForm()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $where = array('email' => $email,'password' => md5($password));
        $result = $this->main_model->check_login('register',$where);
        if($result) {
            $this->session->set_userdata('user_name',$result[0]['username']);
            $this->session->set_userdata('user_id',$result[0]['register_id']);
            $this->session->set_userdata('is_logged',true);
            $this->set_response('success','Login Successful!');
        } else {
            $this->set_response('error','Invalid Email id or Password');
        }
    }

    public function home() {
        $this->check_session();
        $data['profile'] = $this->main_model->select_where('','register',array('register_id' => $this->user_id));
        $this->load->view('home',$data);
    }

    public function deleteProfile() {
        $profile = $this->main_model->select_where('register_id,user_photo','register',array('register_id' => $this->user_id));
        if(empty($profile)){
            $this->set_response('error','Something Wrong!!');
        }

        $is_success = $this->main_model->delete('register',array('register_id' => $this->user_id));
        if($is_success){

            if($profile[0]['user_photo'] != ''){
                unlink('./assets/uploads/user/'.$profile[0]['user_photo']);
                unlink('./assets/uploads/user/thumb/'.$profile[0]['user_photo']);
            }

            $this->session->sess_destroy();
            $this->set_response('success','Profile Successfully Deleted');
        } else {
            $this->set_response('error','Error Deleting!');
        }

    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }


}