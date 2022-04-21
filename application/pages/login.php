<?php

/**********************************
 * CODING HAND:@gadrawingz/@donnekt
 * ********************************/

// Calling top scripts
session_start();
include '../../config/AppConfig.php';
$fun = new AppConfig;

include '../components/Login.php';
$object = new Login();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title><?php echo $fun->getAppName(); ?></title>

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="../assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <link href="../assets/css/custom.css" rel="stylesheet">
  <link href="../assets/css/style-responsive.css" rel="stylesheet">
</head>

<body>
  <div id="login-page">
    <div class="container">
      
      <?php
      if(isset($_GET['type']) && $_GET['type']=='admin') {
        if(isset($_POST['login_'])) {
          $object->adminLogin($_POST['email'], $_POST['password']);
        }
      ?>
      <form class="form-login" action="" method="POST">
        <?php if(isset($_GET['err']) && $_GET['err']=='invalid') {
          echo '<br><center><span class="text-danger" style="font-size: 15px; font-weight: bold; margin: 12px!important;">Invalid details are provided!</span></center><br>';
        }
        ?>
        <h2 class="form-login-heading" style="color: white!important; font-size: 25px; font-weight: bold;">Admin Login</h2>
        <div class="login-wrap">

          <input type="email" class="form-control" placeholder="Email address" name="email" required autofocus>
          <br>
          <input type="password" class="form-control" placeholder="Password" name="password" required autofocus>
          <br>
          <button class="btn btn-theme btn-block" type="submit" name="login_"><i class="fa fa-lock"></i> SIGN IN</button>
          <hr><br>
         
          <div class="registration">
            <a class="font-size-17 underlined-bottom" href="../police/login">
              Police Station Login
            </a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <a class="font-size-17 text-success" href="../main/home">
              <b>Back Home</b>
            </a>
          </div>
        </div>
      </form>
      <?php } ?>




      <?php
      if(isset($_GET['type']) && $_GET['type']=='police') {
        if(isset($_POST['login_p'])) {
          $object->policeStationLogin($_POST['username'], $_POST['password']);
        }
      ?>
      <form class="form-login" action="" method="POST">
        <?php if(isset($_GET['err']) && $_GET['err']=='invalid') {
          echo '<br><center><span class="text-danger" style="font-size: 15px; font-weight: bold; margin: 12px!important;">Invalid details are provided!</span></center><br>';
        }
        ?>
        <h2 class="form-login-heading" style="color: white!important; font-size: 20px; font-weight: bold;">Police Station Login</h2>
        <div class="login-wrap">
          <label for="username" class="c-bolder">Use <u>station username</u> not <span class="text-danger">name</span></label>
          <input type="text" class="form-control" id="username" placeholder="Username" name="username" required autofocus>
          <br>
          <label for="password" class="c-bolder">Password</label>
          <input type="password" class="form-control" placeholder="Password" name="password" required autofocus>
          <br>
          <button class="btn btn-primary btn-block" type="submit" name="login_p"><i class="fa fa-lock"></i> SIGN IN</button>
          <hr><br>
         
          <div class="registration">
            <a class="font-size-17 underlined-bottom" href="../main/login">
              Admin Login
            </a>&nbsp;&nbsp;|&nbsp;&nbsp;
            <a class="font-size-17 text-success" href="../main/home">
              <b>Back Home</b>
            </a>
          </div>
        </div>
      </form>
      <?php } ?>



    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="../assets/lib/jquery/jquery.min.js"></script>
  <script src="../assets/lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="../assets/lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("../assets/img/login-bg.jpg", {
      speed: 500
    });
  </script>
</body>
</html>