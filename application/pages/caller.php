<?php

/**********************************
 * CODING HAND:@gadrawingz/@donnekt
 * https://www.donnekt.com
 * ********************************/

include '../data/IDAllData.php';
$id_query = new IDAllData();


include '../data/PoliceData.php';
$police = new PoliceData();

include '../data/LoginData.php';
$vlogin = new LoginData();


include '../components/Header.php';

// Donnekt Sidebar::Disable Sidebar on(isset)
if(($_GET['inner_page']!='homepage')) {
	include '../components/Sidebar.php';
}


if(isset($_GET['inner_page']) && $_GET['inner_page']=='dashboard') {
	include 'dashboard.php';
} else if(isset($_GET['inner_page']) && $_GET['inner_page']=='logout') {
	if(isset($_SESSION['admin_id'])) {
		session_destroy();
		echo "<script>window.location='../main/login'</script>";
	} else if(isset($_SESSION['ps_id'])) {
		session_destroy();
		echo "<script>window.location='../police/login'</script>";
	} else {
		session_destroy();
		echo "<script>window.location='../main/home'</script>";	
	}
	
} else if(isset($_GET['inner_page']) && $_GET['inner_page']=='create_police') {
	include 'create-police.php';
} else if(isset($_GET['inner_page']) && $_GET['inner_page']=='view_police') {
	include 'view-police.php';
} else if(isset($_GET['inner_page']) && $_GET['inner_page']=='view_users') {
	include 'view-police.php';
} else if(isset($_GET['inner_page']) && $_GET['inner_page']=='view_profile') {
	include 'profile.php';
} else if(isset($_GET['inner_page']) && $_GET['inner_page']=='report_lost') {
	include 'report-lost.php';
} else if(isset($_GET['inner_page']) && $_GET['inner_page']=='report_found') {
	include 'report-found.php';
} else if(isset($_GET['inner_page']) && $_GET['inner_page']=='search_id') {
	include '../components/SearchID.php';
} else if(isset($_GET['inner_page']) && $_GET['inner_page']=='search_res') {
	include '../components/SearchResult.php';
}

// Donnekt Right side
include '../components/RightSide.php';

// Donnekt Footer
include '../components/Footer.php';
?>