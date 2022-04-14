<?php

include '../components/Header.php';

// Donnekt Sidebar::Disable Sidebar on(isset)
if(($_GET['inner_page']!='homepage')) {
	include '../components/Sidebar.php';
}


if(isset($_GET['inner_page']) && $_GET['inner_page']=='dashboard') {
	include 'dashboard.php';
} else if(isset($_GET['inner_page']) && $_GET['inner_page']=='logout') {
	session_destroy();
	echo "<script>window.location='../main/login'</script>";
} else if(isset($_GET['inner_page']) && $_GET['inner_page']=='homepage') {
	include 'client.php';
}



// Donnekt Footer
include '../components/Footer.php';
?>