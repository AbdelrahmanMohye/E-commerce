<?php
session_start();
if(isset($_SESSION['username']) && $_SERVER['REQUEST_METHOD'] == 'POST' ){
  include 'ini.php';
  $Musername = $POST['Musername'];
  $Mpassword = sha1($POST['Mpassword']);
  $Memail    = $POST['Memail'];
  $Mfullname = $POST['Mfullname'];

  if($Mpassword ==" " or {
    echo "password should more than 7 charachters";
  }else{
  $stat = $con->prepare('update users set userName = ?,password = ?, email = ?, fullName = ? where useID = ?');
  $stat->execute(array($Musername, $Mpassword, $Memail, $Mfullname, $_SESSION['ID']));
  ?>
    <button class="alert alert-primary" role="alert"><?php echo $stat->rowCount()."has updated"; ?></button>

  <?php
  include $tmpl . "footer.php";
}
}
?>

