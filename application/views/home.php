<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Demo</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <link href="<?php echo base_url(); ?>assets/css/demo.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<main>
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="main_container">
                    <div class="form-wrap">
                        <div class="text-center">
                            <h5 class="heading">Welcome, <?php echo $this->session->userdata('user_name'); ?></h5>
                        </div>
                        <section class="form-wrapper">
                            <div class="row">
                                <div class="col-lg-8 col-md-9 col-sm-12 col-xs-12 col-lg-offset-2">
                                    <form action="<?php echo base_url(); ?>submitRegistrationForm" method="post" name="registerForm" id="registerForm" enctype="multipart/form-data">
                                        <div  class="well">
                                            <div class="form-horizontal">
                                                <div class="form-group">
                                                    <label for="firstName" class="col-sm-3 control-label">First Name</label>
                                                    <div class="col-sm-6">
                                                        <p class="form-control-static"><?php echo $profile[0]['firstName']; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="lastName" class="col-sm-3 control-label">Last Name</label>
                                                    <div class="col-sm-6">
                                                        <p class="form-control-static"><?php echo $profile[0]['lastName']; ?></p>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="username" class="col-sm-3 control-label">User Name</label>
                                                    <div class="col-sm-6">
                                                        <p class="form-control-static"><?php echo $profile[0]['username']; ?></p>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="email" class="col-sm-3 control-label">Email Id</label>
                                                    <div class="col-sm-6">
                                                        <p class="form-control-static"><?php echo $profile[0]['email']; ?></p>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="" class="col-sm-3 control-label">Gender</label>
                                                    <div class="col-sm-6">
                                                        <p class="form-control-static"><?php echo $profile[0]['gender']; ?></p>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="birthDate" class="col-sm-3 control-label">Date of Birth</label>
                                                    <div class="col-sm-6">
                                                        <p class="form-control-static"><?php echo ($profile[0]['birthDate'] != '0000-00-00') ? $profile[0]['birthDate'] : '-'; ?></p>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="mobileNumber" class="col-sm-3 control-label">Mobile Number</span></label>
                                                    <div class="col-sm-6">
                                                        <p class="form-control-static"><?php echo ($profile[0]['mobileNumber'] != '') ? $profile[0]['mobileNumber'] : '-'; ?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="photo" class="col-sm-3 control-label">Profile Photo</span></label>
                                                    <div class="col-sm-6">
                                                        <?php if($profile[0]['user_photo'] != ''){ ?>
                                                        <img src="<?php echo img_url() ?>user/thumb/<?php echo $profile[0]['user_photo']; ?>">
                                                        <?php } else { ?>
                                                            <p class="form-control-static text-danger">Photo not uploaded</p>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-3 col-sm-10">
                                                        <button class="btn btn-danger" id="deleteProfile">Delete Account</button>
                                                        <a href="<?php echo base_url('logout'); ?>" class="btn btn-danger">Logout</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="<?php echo base_url(); ?>assets/js/app.js" type="application/javascript" ></script>
</body>
</html>