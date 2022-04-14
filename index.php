<?php
/***********************
 * @Donnekt
 * @Gadrawingz
 * ********************/

if(isset($_SESSION['something'])) {
  echo "<script>window.location='user/dashboard'</script>"; 
} else {
  echo "<script>window.location='main/login'</script>"; 
}

?>