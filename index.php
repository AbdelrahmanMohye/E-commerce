<?php
session_start();
include 'init.php';

if(isset($_SESSION['UserSESSION'])){
  echo '<a href = "profile.php?mid='. $_SESSION['UID'].'">'.$_SESSION['UserSESSION'].'</a>';
}else{
	echo '<a href="signup.php">Login</a>';


   // mail('abdelrahmanmhey42@gmail.com', 'test mail', 'hello abdelrahman/n we are proud to inform you about accepting you for new job/n Thanks/n From: Manager');
     
	
	
}

?>

<?php 
include $temp.'footer.php'; 
include $temp.'footer.php';
?>

