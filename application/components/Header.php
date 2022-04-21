<?php

/**********************************
 * CODING HAND:@gadrawingz/@donnekt
 * ********************************/

// Calling top scripts
session_start();
include '../../config/AppConfig.php';
$fun = new AppConfig;

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

  <script type="text/javascript">
    function printReport() {
      let divContents = document.getElementById("report_id").innerHTML;
      let a = window.open('', '', 'height=800, width=1000');
      a.document.write('<html>');
      a.document.write('<body > <h1>Full report document <br>');
      a.document.write(divContents);
      a.document.write('</body></html>');
      a.document.close();
      a.print();
    }
  </script>
  <!-- =======================================================
    Coding hand: @Gadrawingz 
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!--header start-->
    <header class="header black-bg" style="margin-bottom: 0!important">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <?php echo $fun->getAppLogo(); ?>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        
      </div>
      


      <?php if(isset($_SESSION['admin_id']) || isset($_SESSION['ps_id']) || isset($_SESSION['v_id'])) { ?>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="../main/logout">Logout</a></li>
        </ul>
      </div>

      <?php } else {
        // AVOID DIRECT ACCESS PAGE WITHOUT PERMISSION Find @donnekt!
        echo "<script>window.location='../main/home'</script>";
      } ?>
    </header>
    <!--header end-->