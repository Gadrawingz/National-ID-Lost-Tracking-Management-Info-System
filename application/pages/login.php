<?php
// Calling top scripts
session_start();
include '../../config/AppConfig.php';
$fun = new AppConfig;

/**********************************
 * USAGE: (ACCESS ME EVERYWHERE)
 * ********************************/

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
      if(isset($_POST['login_'])) {
        $object->adminLogin($_POST['email'], $_POST['password']);
      }
      ?>
      <form class="form-login" action="" method="POST">
        <?php if(isset($_GET['err']) && $_GET['err']=='invalid') {
          echo '<br><center><span class="text-danger" style="font-size: 15px; font-weight: bold; margin: 12px!important;">Invalid details are provided!</span></center><br>';
        }
        ?>
        <h2 class="form-login-heading" style="color: white!important; font-size: 25px; font-weight: bold;">sign in now</h2>
        <div class="login-wrap">
          <input type="email" class="form-control" placeholder="Email address" name="email" required autofocus>
          <br>
          <input type="password" class="form-control" placeholder="Password" name="password" required autofocus>
          <br>
          <button class="btn btn-theme btn-block" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
          <hr>
         
          <div class="registration">
            Any sign-in problem? Use below link<br/>
            <a class="" href="#">
              Create an account
              </a>
          </div>
        </div>
        <!-- Modal -->
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Forgot Password?</h4>
              </div>
              <div class="modal-body">
                <p>Enter your e-mail address below to reset your password.</p>
                <input type="text" name="reset_email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <input class="btn btn-theme" name="login_">Login</button>
              </div>
            </div>
          </div>
        </div>
        <!-- modal -->
      </form>
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