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
                            <h5 class="heading">Login Form</h5>
                        </div>
                        <section class="form-wrapper">
                            <div class="row">
                                <div class="col-lg-8 col-md-9 col-sm-12 col-xs-12 col-lg-offset-2">
                                    <form action="<?php echo base_url(); ?>loginForm" method="post" name="loginForm" id="loginForm" enctype="multipart/form-data">
                                        <div  class="well">
                                            <div class="form-horizontal">
                                                <div class="form-group">
                                                    <label for="username" class="col-sm-3 control-label">Email Id<span class="required">*</span></label>
                                                    <div class="col-sm-6">
                                                        <input type="email" class="form-control" id="email" name="email">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="password" class="col-sm-3 control-label">Password<span class="required">*</span></label>
                                                    <div class="col-sm-6">
                                                        <input type="password" class="form-control" id="password" name="password">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-sm-offset-3 col-sm-10">
                                                        <button type="submit" class="btn btn-success">Login</button>
                                                        <button type="reset" class="btn btn-default">Reset</button>
                                                        <br><br>
                                                        <p>New user? <a href="<?php echo base_url(); ?>">Create new account</a></p>
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