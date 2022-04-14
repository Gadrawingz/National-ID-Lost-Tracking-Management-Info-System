<?php

// Calling top scripts
session_start();
include '../../config/AppConfig.php';
$fun = new AppConfig;

include '../data/IDAllData.php';
$id_query = new IDAllData();
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
      if(!isset($_SESSION['admin_id']) || isset($_SESSION['admin_id'])) { 
      ?>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout c-brown-box" href="../ids/search">Search for an ID</a></li>
        </ul>
      </div>
      <?php } ?>
    </header>
    <!--header end-->


    <!-- MAIN SIDEBAR MENU -->
    <!-- Sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          
          <li class="mt">
            <a class="active c-bolder" href="../main/login">
              <i class="fa fa-dashboard"></i>
              <span>Login To System</span>
              </a>
          </li>
        
          <li>
            <a href="../post/found">
              <i class="fa fa-pencil"></i>
              <span>Post Found ID </span>
            </a>
          </li>

          <li>
            <a href="../post/lost">
              <i class="fa fa-pencil"></i>
              <span>Post Lost ID </span>
            </a>
          </li><hr>

          <li>
            <a href="../ids/found">
              <i class="fa fa-credit-card"></i>
              <span>View Found IDs </span>
              <span class="label label-theme pull-right mail-info">
                <?php echo $id_query->countAllFoundIDs(); ?>
              </span>
            </a>
          </li>

          <li>
            <a href="../ids/lost">
              <i class="fa fa-question-circle"></i>
              <span>View Lost IDs </span>
              <span class="label label-theme pull-right mail-info">
                <?php echo $id_query->countAllLostIDs(); ?>
              </span>
            </a>
          </li><hr>

          <li class="bg-warning" style="color: white!important;">
            <a class="c-bolder" href="../ids/search">
              <i class="fa fa-search"></i>
              <span>Search for ID</span>
              </a>
          </li>

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!-- Sidebar end-->




    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          

          <div class="col-lg-9 main-chart">

            <?php
            if(isset($_GET['content']) && $_GET['content']=='home') {
            ?>
            <div class="border-head">
              <h2 class="text-primary">Welcome &raquo;</h2><hr>
            </div>
            <?php } ?>

            <div class="row">
            	<?php

            	// Center Components List

              // Content chosen to be loaded on home page
              if(isset($_GET['content']) && $_GET['content']=='home') {
                include '../components/ReadLostID.php';
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
          <?php
            // Components Of National ID Found
            include '../components/RightSide.php';
          ?>

          </div>
          <!-- /col-lg-3 -->
        </div>
        <!-- /row -->
      </section>
    </section>
    <!--main content end-->


    <?php
    // Donnekt Footer
    include '../components/Footer.php';
    ?>