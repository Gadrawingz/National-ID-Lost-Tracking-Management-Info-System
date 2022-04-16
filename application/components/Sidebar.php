
    <!-- MAIN SIDEBAR MENU -->
    <!-- Sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="../assets/img/ui-sam.jpg" class="img-circle" width="80"></a></p>

          <?php if(isset($_SESSION['admin_id'])) { ?>
          <h5 class="centered">Admin</h5>
          
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

          <li>
            <a class="c-bolder" href="../ids/search">
              <i class="fa fa-search"></i>
              <span>Search for an ID</span>
              </a>
          </li>

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
          </li><hr>

          <li>
            <a class="c-bolder" href="../ids/search">
              <i class="fa fa-search"></i>
              <span>Search for an ID</span>
              </a>
          </li>
          <?php } ?>






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
