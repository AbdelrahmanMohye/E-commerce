<?php 

session_start();
include 'init.php';
$do = '';
if(isset($_GET['do'])){
   $do = $_GET['do'];
}else{
	$do = "Please Dont play with me :)";
}
$do = filter_var($do,FILTER_SANITIZE_STRING);

   $State = $con->prepare('select items.*, categories.*,users.* from users inner join items on items.member_ID = users.userID inner join categories on items.categ_ID = categories.CID where categories.Cname = ?');
   $State->execute(array($do));
   $rows = $State->fetchAll();
  
   ?>
    <div class="container">
    	<h2 class="title_page"><?php echo ucfirst($do); ?></h2>
        <div class="row Ads">
     		<div class="col-sm-12">
     			<div class="card text-white md-3">
     				<div class="card-header bg-primary">Ads</div>
     				<div class="card-body  row">
                    <?php foreach ($rows as $row) { ?>
                       <div class="Ads_item col-sm-6 col-md-3">
 			               <div class="Ads_item_content">
 			                <div class="Ads_pic">
                                <span class="price_show"><?php echo $row['price'];?></span>
                                <img src="data/site_pic/User_undefine.png" alt="item">
                            </div>
 	                        <div class="Ads_info">
 			                  <div>
 						        <a href="item_details.php?itemid=<?php echo $row['item_ID']; ?>"><?php echo $row['name'];?></a>
 					          </div>
 					<div>
 					<?php echo $row['description'];?>
 					</div>
 				</div>
 			</div>
            
 		</div>	
   
   <?php } ?>

        </div>
     </div>
  </div>
</div>
</div>

   <?php
   
 include $temp.'footer.php';
 include $temp.'footer.php';
?>