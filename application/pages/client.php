<?php

/**********************************
 * CODING HAND:@gadrawingz/@donnekt
 * ********************************/

// Calling top scripts
session_start();
include '../../config/AppConfig.php';
$fun = new AppConfig;

include '../data/IDAllData.php';
$id_query = new IDAllData();

include '../components/Login.php';
$vlogin = new Login();

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
  <link href="../assets/../assets/img/favicon.png" rel="icon">
  <link href="../assets/../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="../assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="../assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../assets/css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="../assets/lib/gritter/css/jquery.gritter.css" />
  <link href="../assets/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="../assets/css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="../assets/lib/gritter/css/jquery.gritter.css" />
  <link rel="stylesheet" type="text/css" href="../assets/lib/bootstrap-fileupload/bootstrap-fileupload.css" />
  <link rel="stylesheet" type="text/css" href="../assets/lib/bootstrap-datepicker/css/datepicker.css" />
  <link rel="stylesheet" type="text/css" href="../assets/lib/bootstrap-daterangepicker/daterangepicker.css" />
  <link rel="stylesheet" type="text/css" href="../assets/lib/bootstrap-timepicker/compiled/timepicker.css" />
  <link rel="stylesheet" type="text/css" href="../assets/lib/bootstrap-datetimepicker/datertimepicker.css" />

  <!-- Custom styles for this template -->
  <link href="../assets/css/style.css" rel="stylesheet">
  <link href="../assets/css/custom.css" rel="stylesheet">
  <link href="../assets/css/style-responsive.css" rel="stylesheet">
  <script src="../assets/lib/chart-master/Chart.js"></script>
  <!-- =======================================================
    Coding hand: @Gadrawingz 
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <?php echo $fun->getAppLogo(); ?>
      <!--logo end--> 

      <?php
      if(isset($_SESSION['admin_id']) || isset($_SESSION['ps_id']) || isset($_SESSION['v_id'])) { 
      ?>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="../main/logout">Logout</a></li>
        </ul>
      </div>
      <?php } else { ?>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout c-transparent-like" href="../main/login">Admin Login</a></li>
          <li><a class="logout c-brown-box" href="../police/login">Police Login</a></li>
        </ul>
      </div>      
      <?php } ?>
    </header>
    <!--header end-->

    <?php
    include '../components/Sidebar.php';
    ?>
          
          <div class="col-lg-12 main-chart">
            <?php
            if(isset($_GET['content']) && $_GET['content']=='home') {
            ?>
            <div class="border-head">
              <h2 class="text-primary">National ID Lost MIS</h2><hr>
            </div>
            <?php } ?>

            <div class="row">
            	<?php

            	// Center Components List

              // Content chosen to be loaded on home page
              if(isset($_GET['content']) && $_GET['content']=='home') {
                include '../components/VisitorUser.php';
              }

              // Creation Component
              if(isset($_GET['content']) && $_GET['content']=='reg_v') {
                include '../components/VisitorUser.php';
              }

              // National ID Found Component
              if(isset($_GET['content']) && $_GET['content']=='view_found') {
                include '../components/ReadFoundID.php';
              }

              // National ID Lost Component
              if(isset($_GET['content']) && $_GET['content']=='view_lost') {
                include '../components/ReadLostID.php'; 
              }

              // Post LOST_ID Component
              if(isset($_GET['content']) && $_GET['content']=='post_found') {
                include '../components/PostFoundID.php'; 
              }

              // Post FOUND_ID Component
              if(isset($_GET['content']) && $_GET['content']=='post_lost') {
                include '../components/PostLostID.php'; 
              }

              // Search For ID Component
              if(isset($_GET['content']) && $_GET['content']=='search_id') {
                include '../components/SearchID.php'; 
              }

              // (View Search Results) Component
              if(isset($_GET['content']) && $_GET['content']=='search_res') {
                include '../components/SearchResult.php'; 
              }
            	?>

            </div>

          </div>
          <!-- /col-lg-9 END SECTION MIDDLE -->

          <!-- RIGHT SIDEBAR CONTENT -->
          <?php /* RightSide Component excluded for @donnekt reason */ ?>
          
          <!-- /col-lg-3 -->
        </div>
        <!-- /row -->
      </section>
    </section><br><br><br>
    <!--main content end-->


    <?php
    // Donnekt Footer
    include '../components/Footer.php';
    ?>