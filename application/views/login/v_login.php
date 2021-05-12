<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Google Font Poppins -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="<?php echo base_url('assets')?>/css/login.svg" rel="stylesheet">

    <!-- CSS Custom -->
    <link href="<?php echo base_url('assets')?>/css/login.css" type="text/css" rel="stylesheet">
    <title>myinsta</title>

    <!-- Fonawesome ICONS -->
    <script src="https://kit.fontawesome.com/4a32339737.js" crossorigin="anonymous"></script>
  </head>

  <body>
    <!-- <h1>Hello, world!</h1> -->
    <div class="container">

      <div class="img">
        <img src="<?php echo base_url('assets')?>/img/login_asset.svg">
      </div>

      <div class="login-container">
        <form method="post" action="<?php echo site_url('signin') ?>">

          <img class="avatar" src="<?php echo base_url('assets')?>/img/profil_pict.svg">
          <h2>My.Insta</h2>

          <?php 
            if ($this->session->flashdata('message')) {
              echo '<div class="alert alert-danger">
                  '.$this->session->flashdata('message').'
              </div>';
            }
          ?>
          
          <div class="input-div one">
            <div class="i">
              <i class="fas fa-user"></i>
            </div>
            <div>
              <!-- <h5>Username</h5> -->
              <input class="input" placeholder="Username" type="text" name="username" required>
            </div>
          </div>

          <div class="input-div two">
            <div class="i">
              <i class="fas fa-lock"></i>
            </div>
            <div>
              <!-- <h5>Password</h5> -->
              <input class="input" placeholder="Password" type="password" name="password" required>
            </div>
          </div>

          <a href="#">Forgot Password?</a>
          <input type="submit" class="btn" value="login">
          <a class="btn" href="<?php echo site_url('register') ?>">Register</a>

        </form>
      </div>

    </div>

    <!-- Custom JS -->
    <script type="text/javascript" src="<?php echo base_url('assets')?>/js/login.js" ></script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>