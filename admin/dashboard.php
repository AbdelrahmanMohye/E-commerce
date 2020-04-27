<?php
 session_start();
 if(isset($_SESSION['username'])){
 include'init.php';

 $stat = $con->prepare("select count(userID) from users");
 $stat->execute();
 $Tmembers = $stat->fetchColumn();

 $stat = $con->prepare("select count(userID) from users where regStatus = 0");
 $stat->execute();
 $Pmembers = $stat->fetchColumn();

 $stat = $con->prepare("select count(item_ID) from items");
 $stat->execute();
 $Titems = $stat->fetchColumn();



 $stat = $con->prepare("select username,userID from users order by userID DESC LIMIT 8");
 $stat->execute();
 $Lmembers = $stat->fetchAll();

 $stat = $con->prepare("select name,item_ID from items order by item_ID DESC LIMIT 8");
 $stat->execute();
 $Litems = $stat->fetchAll();

 ?>

<div class="container">
	<h2 class="title_page"> Dashboard</h2>
	
		<div class="home_state row">
			<div class="col-sm-6 col-lg-3">
				<div class="state  TM">
					Totale Member<br/>
					<a href="members.php?"><span><?php echo $Tmembers; ?></span></a>
				</div>
			</div>

			<div class="col-sm-6 col-lg-3">
					<div class="state  PM">
						Pending Member<br/>
						<a href="members.php?do=pinding"><span><?php echo $Pmembers; ?></span></a>
					</div>
		    </div>

			<div class="col-sm-6 col-lg-3">
				<div class="state  TI">
					Totale Items<br/>
					<a href="categories.php?"><span><?php echo $Titems; ?></span></a>
				</div>
			</div>

			<div class="col-sm-6 col-lg-3">
				<div class="state  TC">
					Totale Comments<br/>
					<span>300</span>
				</div>
			</div>

		</div>


		<!--
           <a href='?do=Edit&id=".$member['userID']."'>
                         						<button class='btn btn-success'><i class='fa fa-edit'></i> Edit</button>
                         					</a>
                        				 	<a href='?do=Delete&id=".$member['userID']."' style='margin-right:0px;'>
                         						<button class='btn btn-danger'><span style='font-weight:bold'>x</span>Clear</button>
                         					</a>
		 -->

	<div class="last_state row">
		<div class="col-sm-12 col-lg-6">
			<div class="last last_members">
				<h6><i class="fas fa-users "></i> Last Register Member</h6>
				<div>
					<ul class="list-unstyled">
						<?php 
						     
						     foreach ($Lmembers as $member) {
						     	echo "<li class='list-group-item'><a href='members.php?do=Edit&id=".$member['userID']."'>".$member['username']."</a></li>";
						     }

						?>
					</ul>
				</div>
			</div>
		</div>

		<div class="col-sm-12 col-lg-6">
			<div class="last last_members">
				<h6><i class="fas fa-thumbtack"></i> Last Items</h6>
				<div>
					<ul class="list-unstyled">
						<?php 
						     
						     foreach ($Litems as $item) {
						     	echo "<li class='list-group-item'><a href='categories.php?do=Edit&id=".$item['item_ID']."'>".$item['name']."</a></li>";
						     }

						?>
					</ul>
				</div>
			</div>
		</div>
		
	</div>
</div>

 <?php
 include $tmpl.'footer.php';
}else{
	header('location:index.php');
	exit();
}
include $tmpl . "footer.php";
?>

