
    <!-- MAIN SIDEBAR MENU -->
    <!-- Sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          
          <?php if(isset($_SESSION['admin_id']) || isset($_SESSION['ps_id']) || isset($_SESSION['v_id'])) { ?>
          <p class="centered">
            <a href="#" style="opacity: 100px;">
              <i class="fa fa-user fa-2x"></i>
            </a>
          </p>
          <?php } else { ?>
          <p class="centered">
            <a href="#" style="opacity: 100px;">
              <center>
                <p style="background-color: #000; height: 60px; width: 60px;" class="img-circle" width="40"></p>
              </center>
            </a>
          </p>
          <?php } ?>


          <?php if(isset($_SESSION['admin_id'])) { ?>
          <h5 class="centered">Admin (NIDA)</h5>
          
          <li class="mt">
            <a class="active" href="../main/dashboard">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          
          <li>
            <a href="../police/register">
              <i class="fa fa-envelope"></i>
              <span>Add Police station </span>
            </a>
          </li>

          <li>
            <a href="../police/view">
              <i class="fa fa-envelope"></i>
              <span>Manage All stations </span>
            </a>
          </li><hr>

          <li>
            <a href="../report/lost">
              <i class="fa fa-question-circle"></i>
              <span>Report of Lost IDs</span>
            </a>
          </li>

          <li>
            <a href="../report/found">
              <i class="fa fa-credit-card"></i>
              <span>Report of Found IDs</span>
            </a>
          </li><hr>

          <?php } if(isset($_SESSION['ps_id'])) { ?>
          <h5 class="centered">Police Station User</h5>
          <h6 class="centered">(<?php echo $_SESSION['ps_name']; ?>)</h6><hr>
          
          <li class="mt">
            <a class="active c-bolder" href="../main/dashboard">
              <i class="fa fa-home"></i>
              <span>Dashboard</span>
              </a>
          </li><br>

          <li>
            <a href="../ids/lost">
              <i class="fa fa-list-alt"></i>
              <span>Manage Lost IDs</span>
              <span class="label label-theme pull-right mail-info">
                <?php echo $id_query->countAllFoundIDs(); ?>
              </span>
            </a>
          </li>

          <li>
            <a href="../ids/found">
              <i class="fa fa-list-alt"></i>
              <span>Manage Found IDs</span>
              <span class="label label-theme pull-right mail-info">
                <?php echo $id_query->countAllLostIDs(); ?>
              </span>
            </a>
          </li>

          <li>
            <a href="../users/all">
              <i class="fa fa-list"></i>
              <span>Manage All Users</span>
              <span class="label label-theme pull-right mail-info">
                <?php echo $id_query->countAllUsers(); ?>
              </span>
            </a>
          </li>

          <li>
            <a href="../users/pro">
              <i class="fa fa-pencil"></i>
              <span>Edit Profile</span>
            </a>
          </li><hr>
        
          <?php } if(isset($_SESSION['v_id'])) { ?>
          <h5 class="centered">Visitor(User)</h5>
          <h6 class="centered">(<?php echo $_SESSION['v_names']; ?>)</h6><hr>
          
          <li class="mt">
            <a class="active c-bolder" href="../main/dashboard">
              <i class="fa fa-home"></i>
              <span>Dashboard</span>
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
          </li>

          <li>
            <a href="../users/pro">
              <i class="fa fa-pencil"></i>
              <span>Edit Profile</span>
            </a>
          </li><hr>

          <li>
            <a href="../ids/lost">
              <i class="fa fa-list-alt"></i>
              <span>View Lost IDs</span>
              <span class="label label-theme pull-right mail-info">
                <?php echo $id_query->countAllFoundIDs(); ?>
              </span>
            </a>
          </li>

          <li>
            <a href="../ids/found">
              <i class="fa fa-list-alt"></i>
              <span>View Found IDs</span>
              <span class="label label-theme pull-right mail-info">
                <?php echo $id_query->countAllLostIDs(); ?>
              </span>
            </a>
          </li>
          <?php } 
          if(!isset($_SESSION['admin_id']) && !isset($_SESSION['ps_id']) && !isset($_SESSION['v_id'])) { ?>
          <li>
            <a class="c-bolder" href="../user/register">
              <i class="fa fa-search"></i>
              <span>CREATE ACCOUNT</span>
              </a>
          </li>
          <?php } ?>

          <li>
            <a class="c-bolder" href="../ids/search">
              <i class="fa fa-search"></i>
              <span>SEARCH FOR ID</span>
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
        <!-- @gadrawingz row sittin f****in here -->      
        <div class="row">
