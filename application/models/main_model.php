<?php

class Main_model extends CI_Model
{
    public $user_id;
    public $date;
    public $datetime;
    public $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = $this->load->database('default', TRUE);
        $this->load->helper('date');
        date_default_timezone_set('Asia/Kolkata');
        $this->date = date("Y-m-d");
        $this->datetime = date('Y-m-d H:m:s');
        $this->user_id = $this->session->userdata('user_id');
    }

    /** Functions to select data from tables **/

    public function select_where($columns = '', $table, $where = '' ,$order_column = '' ,$group_by = '' ,$limit = '', $offset = '')
    {
        if($columns != ''){
            $this->db->select($columns);
        }
        if($where != ''){
            $this->db->where($where);
        }
        if($order_column != ''){
            $this->db->order_by($order_column);
        }
        if($group_by != ''){
            $this->db->group_by($group_by);
        }
        if($limit != '' && $offset == ''){
            $this->db->limit($limit);
        }
        if($limit != '' && $offset != ''){
            $this->db->limit($limit,$offset);
        }

        $query =$this->db->get($table);
        if($query->num_rows()>0){
            return $query->result_array();
        } else{
            return false;
        }
    }

    public function insert_data($table,$data) /** Function to insert into table  **/
    {
        $query = $this->db->insert($table,$data);
        if($query)
            return true;
        else
            return false;
    }

    public function check_exists($table,$where)
    {
        $query = $this->db->get_where($table,$where);
        if($query->num_rows() > 0){
            return $query->num_rows();
        } else {
            return false;
        }

    }

    public function check_login($table,$where)
    {
        $query = $this->db->get_where($table,$where);
        if($query->num_rows()>0) {
            return $query->result_array();
        }else
            return false;
    }

    public function delete($table,$where)
    {
        $query = $this->db->delete($table,$where);
        if($query) return true;
        else return false;
    }


}