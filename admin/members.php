<?php
 session_start();
 if(isset($_SESSION['username'])){
 $TP = 'Members';
 include'init.php';
 
 $do = isset($_GET['do'])?$_GET['do']:'Manage';

 // Manage page
 if($do == 'Manage'){
    include 'manage.php';
 }

 elseif($do == 'pinding'){
   include 'pinding.php';
 }

 elseif($do == 'active'){
    $Gid = $_GET['id'];
    $stat = $con->prepare('update users set regStatus = 1 where userID = ?');
    $stat->execute(array($Gid));
    header('location:?do=pinding');
 }

 elseif($do == 'Delete'){
    $Gid = $_GET['id'];
    $stat = $con->prepare('delete from users where userID = ?');
    $stat->execute(array($Gid));
    header('location:?do=Manage');
 }
 
 // Add new member page
 elseif ($do == 'Add') {
   include 'AddNewMember.php';
   include $tmpl.'footer.php';
 }

 // insert new mwmber page
 elseif($do == 'insert'){
    ?>
        <div class="container text-center">
        <h2 style="margin: 50px;color: #777" > Inset New Member</h2>
    <?php
    $Musername = $_POST['Musername'];
    $Mpassword = $_POST['Mpassword'];
    $Memail = $_POST['Memail'];
    $Mfullname = $_POST['Mfullname'];

    $errors = array();

    if(strlen($Mpassword) < 8){$errors[]="password should be more 7 charachters";}
    if(filter_var($Memail,FILTER_VALIDATE_EMAIL) == false){$errors[]="Email Not Valid";}
    $Musername = filter_var($Musername,FILTER_SANITIZE_STRING);
    $Mfullname = filter_var($Mfullname,FILTER_SANITIZE_STRING);
    $Mpassword = filter_var($Mpassword,FILTER_SANITIZE_STRING);

    $encMpassword = sha1($Mpassword);

    if(count($errors)){
      for($x=0;$x<count($errors);$x++){
        echo '<button class="alert alert-danger text-center col-sm-10" role="alert">'.$errors[$x].'</button><br>';
      }
    }else{
      $stat = $con->prepare('insert into users(userName,password,email,fullName,date,regStatus) values(:zuser, :zpass, :zemail, :zfullname, now(),1)');
      $stat->execute(array('zuser'=>$Musername, 'zpass'=>$encMpassword, 'zemail'=>$Memail, 'zfullname'=>$Mfullname ));
      echo '<button class="alert alert-primary text-center col-sm-10" role="alert">User '.$Musername.' Become New Member</button><br>';
    }
    echo "</div>";
    include $tmpl.'footer.php';
 }
 
 // Edit member info
 elseif($do == 'Edit'){
    $Gid = $_GET['id'];
    $stat = $con->prepare('select * from users where userID = ?');
    $stat->execute(array($Gid));
    $rows = $stat->fetch();
    $cnt = $stat->rowCount();
    
    if($cnt){
 	include 'Edit.php';
    include $tmpl.'footer.php';
    }
}

// update member info
elseif($do == 'update'){
    ?>
    <div class="container text-center">
        <h2 style="margin: 50px;color: #777" > Update Member Info</h2>
        
    <?php
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $Musername = $_POST['Musername'];
        $Mpassword = $_POST['Mpassword'];
        $Memail    = $_POST['Memail'];
        $Mfullname = $_POST['Mfullname'];
        $oldMpassword = $_POST['oldMpassword'];

        if(empty($Mpassword)){
            $encMpassword = $oldMpassword;
        }else{
            $encMpassword = sha1($Mpassword);
        }

        $errors = array();
        if(!strlen($Musername)){$errors[] = "user name should be not empty";} 
        if(strlen($Mpassword) < 8 && !empty($Mpassword)){$errors[] = "password should be more than 7 charachters";}
        if(!strlen($Memail)){$errors[] = "email filed shouldn't be empty";}
        if(!strlen($Mfullname)){$errors[] = "fullName filed shouldn't be empty";}
        if(count($errors)){
            for($x=0 ; $x < count($errors);$x++){
                echo '<button class="alert alert-danger text-center col-sm-10" role="alert">'.$errors[$x].'</button><br>';
            }
        }else{
            $stat = $con->prepare('update users set userName = ?,password = ?, email = ?, fullName = ? where userID = ?');
            $stat->execute(array($Musername, $encMpassword, $Memail, $Mfullname, $_SESSION['ID']));
            ?>
            <button class="alert alert-primary" role="alert"><?php echo $stat->rowCount()." item has updated"; ?></button>
            <?php
        }
   
    }else{
     echo"you can't access this page by direct";
    }
 echo '</div  >';
 include $tmpl.'footer.php';
}

else{
	header('location:index.php');
	exit();
}

 include $tmpl.'footer.php';
}
?>