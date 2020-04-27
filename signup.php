<?php
ob_start();
session_start();
if(isset($_SESSION['UserSESSION'])){
	header('location:index.php');
}
include "init.php";
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if(isset($_POST['login'])){
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$hashpass = sha1($pass);

		$stat = $con->prepare('select userName, userID from users where userName = ? and password = ?');
		$stat->execute(array($user,$hashpass));
		$cnt = $stat->rowCount();
		if($cnt){
			$rows = $stat->fetch();
			$_SESSION['UserSESSION'] = $rows['userName'];
			$_SESSION['UID']         = $rows['userID'];
			header('location:index.php');
			exit();
		}else{
			header('location:signup.php');
		}
	}else if(isset($_POST['SignUp'])){
		$user = $_POST['user'];
		$pass = $_POST['pass'];
		$hashpass = sha1($pass);
		$email = $_POST['email'];
		$Fname = $_POST['Fname'];

        $Errors = array();
        if(empty($user)){$Errors[] = "Please Enter your name";}
        if(empty($pass)){$Errors[] = "Please enter the password";}
        if(empty($email)){$Errors[] = "Please Enter your email";}
        if(empty($Fname)){$Errors[] = "Please Enter your FullName";}

		$stat = $con->prepare('select * from users where userName = ?');
		$stat->execute(array($user));
		$cnt = $stat->rowCount();

		if($cnt){
                  $Errors[] = "This username not avilable";
			}

		if(!empty($Errors)){
			foreach ($Errors as $Error) {
				echo "<div class='alert alert-danger'>". $Error ."</div>";
			}
		}else{
			$stat = $con->prepare('insert into users(userName,password,email,fullName,date) values(?,?,?,?,now())');
			$stat->execute(array($user,$hashpass,$email,$Fname));
			echo "<div class='alert alert-primary'> you are be member </div>";
		}


	}
}

?>

<div class="container text-center SignUp_Login">
	<div class="choose_sing_login">
		<span class="T_login selected">Login</span> | <span class="T_sign">SignUp</span>
	</div>

		<form  class="login" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
			<input class="form-control" type="text" name="user" placeholder="Username" autocomplete="off">
			<input class="form-control" type="password" name="pass" placeholder="password" autocomplete="new-password">
			<input class="btn btn-primary btn-block" type="submit" value="login" name="login">
		</form>


		<form  class="SignUp hidden" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
			<input class="form-control" type="text" name="user" placeholder="Username" autocomplete="off">
			<input class="form-control" type="password" name="pass" placeholder="password" autocomplete="new-password">
			<input class="form-control" type="email" name="email" placeholder="email" autocomplete="off">
			<input class="form-control" type="text" name="Fname" placeholder="full name" autocomplete="off">
			<input class="btn btn-primary btn-block" type="submit" value="SignUp" name="SignUp">
		</form>
</div>

<?php 

include $temp.'footer.php';
include $temp.'footer.php';
?>


