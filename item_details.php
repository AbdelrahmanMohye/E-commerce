<?php 
 session_start();
 include 'init.php';

 if( isset($_GET['itemid'])){
       $itemid = $_GET['itemid'];
       $stat = $con->prepare('select items.*,categories.*,users.* from items inner join categories on items.categ_ID = categories.CID inner join users on items.member_ID = users.userID where item_ID = ?');
       $stat->execute(array($itemid));
       $rows =$stat->fetch();
       
  ?>
  			<div class="container">
				<h2 class="title_page"> Item Details </h2>
				<div class="row">
      				 <div class="col-sm-12 col-md-4">
       					<img width="100%" height="100%" src="data/site_pic/User_undefine.png">
      				 </div>
      				 <div class="items_details col-sm-12 col-md-6">
                        <h3 style="text-align: center;color: #777"><?php
                         echo $rows['Cname'];
                         ?></h3>
      				 	<ul class="list-unstyled">
       						<li><span>Name        </span> : <?php echo $rows['name']; ?></li>
       						<li><span>Description </span> : <?php echo $rows['description']; ?></li>
       						<li><span>Price       </span> : <?php echo $rows['price']; ?></li>
       						<li><span>Made in     </span> : <?php echo $rows['country_made']; ?></li>
       						<li><span>State       </span> : <?php echo $rows['status']; ?></li>
       						<li><span>Date        </span> : <?php echo $rows['add_date']; ?></li>
       						<li><span>By          </span> : <a href="profile.php?mid=<?php echo $rows['userID']?>"><?php echo $rows['userName']; ?></a></li>
       					</ul>
       				</div>
				</div>
			</div>
<?php

 }else{
 	?>

     <div class="container text-center">
     	<h5 style="margin-top: 100px;"><span style="font-size: 30px;font-weight: bold;color:red">Oops!!</span> You are denieded to access this page</h2>
     </div>

 	<?php
 }
 include $temp.'footer.php'; 
 include $temp.'footer.php';
?>

