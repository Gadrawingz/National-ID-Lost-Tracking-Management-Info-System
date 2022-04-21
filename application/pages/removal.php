<?php

include '../data/IDAllData.php';
$query = new IDAllData();

// ENA @gadrawingz
if(isset($_GET['en'])) {
  if($query->enableUser($_GET['en'])=='1') {
    echo "<script>alert('USER IS ENABLED!')</script>";
    echo "<script>window.location='../users/all'</script>";
  } else {
    echo "<script>alert('OOH! USER IS NOT ENABLED!')</script>";
    echo "<script>window.location='../users/all'</script>";
  }
}


// DIS Code: @gadrawingz
if(isset($_GET['ds'])) {
  if($query->disableUser($_GET['ds'])=='1') {
    echo "<script>alert('USER IS DISABLED!')</script>";
    echo "<script>window.location='../users/all'</script>";
  } else {
    echo "<script>alert('OOH! USER IS NOT DISABLED!')</script>";
    echo "<script>window.location='../users/all'</script>";
  }
}


// Verify ID::
if(isset($_GET['vf'])) {
  if($query->verifyReceivedId($_GET['vf'])=='1') {
    echo "<script>alert('ID HAS BEEN VERIFIED!')</script>";
    echo "<script>window.location='../ids/found'</script>";
  } else {
    echo "<script>alert('OOH! ID IS NOT VERIFIED!')</script>";
    echo "<script>window.location='../ids/found'</script>";
  }
}

// Verify ID::
if(isset($_GET['uv'])) {
  if($query->cancelIDVerification($_GET['uv'])=='1') {
    echo "<script>alert('VERIFICATION IS CANCELLED!')</script>";
    echo "<script>window.location='../ids/found'</script>";
  } else {
    echo "<script>alert('OOH! VERIFICATION IS NOT CANCELLED!')</script>";
    echo "<script>window.location='../ids/found'</script>";
  }
}
?>