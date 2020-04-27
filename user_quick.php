<?php
session_start();
include 'init.php';
if(isset($_SESSION['UserSESSION'])){
	//$tmp="include/templetes/header.php";
	//include $tmp;
	
?>
<div class="container">
	<img width="50" height="50" style="border-radius: 50%;" src="data/site_pic/User_undefine.png">
 <div class="btn-group">
 	
  <button type="button" class="btn btn-light dropdown-toggle" aria-labelledby="SupportedContent" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    <?php echo $_SESSION['UserSESSION']; ?>
  </button>

  <div class="dropdown-menu" id="SupportedContent">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">Separated link</a>
  </div>

</div>
</div>
<?php
}
include $temp.'footer.php'; 
include $temp.'footer.php';
?>