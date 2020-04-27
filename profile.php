<?php
ob_start();
session_start();
//include 'user_quick.php';
include 'init.php';
if(isset($_SESSION['UserSESSION']) && isset($_GET['mid'])){
    $mid = $_GET['mid'];
    $mid = filter_var($mid,FILTER_SANITIZE_STRING);
   $check = $con->prepare('select * from users where userID = ? and userName = ?');
   $check->execute(array($mid,$_SESSION['UserSESSION']));
   $cnt = $check->rowCount();
   ?>
     
     <div class="container">
     	<h2 class="title_page">My Profile</h2> 
     	<div class="info_pic row">
     		<div class="pic col-sm-12 col-md-4">
     			<div class="pic_fix">
                  <img src="data/site_pic/img3.jpg">
     			  
     			</div>
     		</div>
     		<div class="info_details col-sm-12 col-md-8">
     			<div class="card text-white  mb-3">
     				<div class="card-header bg-primary">INFO</div>
     				<div class="card-body">
     					<ul >
     						<?php 
     				  		$stat = $con->prepare('select * from users where userID = ?');
     				  		$stat->execute(array($mid));
     				  		$row = $stat->fetch();
     						?>
     						<li ><span >UserName       </span> : <?php echo $row['userName'];?></li>
     						<li ><span >FullName       </span> : <?php echo $row['fullName'];?></li>
     						<li ><span >Email          </span> : <?php echo $row['email'];?></li>
     						<li ><span >Regeste Date   </span> : <?php echo $row['date'];?></li>
     					</ul>
     				</div>
     			</div>
     		</div>
     	</div>
     	<div class="row Ads">
     		<div class="col-sm-12">
     			<div class="card text-white md-3">
     				<div class="card-header bg-primary">Ads</div>
     				<div class="card-body  row">
     					<?php

                             $stat = $con->prepare('select * from items where member_ID = ?');
                             $stat->execute(array($mid));
                             $Ads = $stat->fetchAll();
                             foreach ($Ads as $Ad) {
                             	?>
 									<div class="Ads_item col-sm-6 col-md-3">

 									  <div class="Ads_item_content">
 										   <div class="Ads_pic">
                                              <span class="price_show"><?php echo $Ad['price'];?></span>
                                              <img src="data/site_pic/User_undefine.png" alt="item">
                                           </div>
 											<div class="Ads_info">
 											<div>
 												<!--<span style="font-weight: bold;font-size: 15px;">Name : </span>-->
 												<a href="item_details.php?itemid=<?php echo $Ad['item_ID']; ?>"><?php echo $Ad['name'];?></a>
 											</div>
 											<div>
 												<!--<span style="font-weight: bold;font-size: 15px;">Price : </span>-->
 												<?php echo $Ad['description'];?></div>
 										</div>
                                        <?php 
                                        
                                        if($cnt && $_SESSION['UID'] == $mid)
                                        echo '<div class="button_ED" >
                                                <a href="">
                                                 <button class="btn btn-primary btn-sm"> Edit </button>
                                                </a><br/>
                                                <a href="">
                                                  <button class="btn btn-danger  btn-sm"> Delete </button>
                                                </a>
                                             </div>';
                                        ?>
 									  </div>
            
 									</div>
                             	<?php
                             }
     					 ?>
     				</div>
     			</div>
     		</div>
     	</div>
     </div>

   <?php

}else{
	echo '<a href="index.php">Login</a>';
}

?>

<?php 
include $temp.'footer.php'; 
include $temp.'footer.php';
?>
