<!-- <!DOCTYPE html>
<html>
<head>
	<title>login</title>
</head>
<body>
<form action="<?php echo base_url('index.php/admin/login') ?>" method="POST">
<input type="text" name="username">
<input type="PASSWORD" name="password">
<button type="submit" name="submit">login</button>
</form>
</body>
</html>


 -->



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentallela Alela! | </title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url() ?>gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url() ?>gentelella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url() ?>gentelella/production/css/custom.css" rel="stylesheet">
  </head>

  <body style="background:#F7F7F7;">

    <div class="">
      <a class="hiddenanchor" id="toregister"></a>
      <a class="hiddenanchor" id="tologin"></a>

      <div id="wrapper">
        <div id="login" class=" form">
          <section class="login_content">
            <form action="<?php echo base_url('index.php/login/login') ?>" method="POST">
              <h1>Login Form</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" name="username"  />
              </div>
              <div>
              <!-- <label>Password</label> -->
                <input type="password" class="form-control" placeholder="Password" name="password"  /><?php echo form_error('password') ?>
              </div>
              <div>
                <button type="submit" class="btn btn-default submit" >Log in</button>
                <!-- <button type="submit" name="submit">login</button> -->
                <!-- <a class="reset_pass" href="#">Lost your password?</a> -->
              </div>
              <div class="clearfix"></div>
              <div class="separator">

                </p>
                <div class="clearfix"></div>
                <br />
                <div>
                  <h1><i class="fa fa-paw" style="font-size: 26px;"></i> Gentelella Alela!</h1>

                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class=" form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>
              <div class="clearfix"></div>
              <div class="separator">

                <p class="change_link">Already a member ?
                  <a href="#tologin" class="to_register"> Log in </a>
                </p>
                <div class="clearfix"></div>
                <br />
                <div>
                  <h1><i class="fa fa-paw" style="font-size: 26px;"></i> Gentelella Alela!</h1>

                  <p>©2015 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>