<?php
 session_start();
 $nonavbar = '';
 if(isset($_SESSION['username'])){
 	header('location:dashboard.php');
   exit();
 }
 include"init.php";
 if($_SERVER['REQUEST_METHOD'] == 'POST' ){
   $username = $_POST['user'];
   $password = $_POST['pass'];
   $encpass  = sha1($password);

   $stat = $con->prepare('select userName, userID from users where userName = ? and password = ?');
   $stat->execute(array($username, $encpass));
   $count = $stat->rowCount();
   if($count){
   	$rows = $stat->fetch();
   	$_SESSION['username'] = $rows['userName'];
   	$_SESSION['ID']       = $rows['userID'];
   	header('location:dashboard.php');
      exit();
   }
 }
 ?>
<div class="container text-center">
<form  class="login" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
	<h3 class="title_page">admin Login</h3>
	<input class="form-control" type="text" name="user" placeholder="username" autocomplete="off">
	<input class="form-control" type="password" name="pass" placeholder="password" autocomplete="new-password">
	<input class="btn btn-primary btn-block" type="submit" value="login" name="login">
</form>
</div>
<?php include $tmpl . "footer.php"; ?>