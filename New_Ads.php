<?php
session_start();
include 'init.php';
if(isset($_SESSION['UserSESSION'])){
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$name         = $_POST['name'];
    $description  = $_POST['description'];
    $price        = $_POST['price'];
    $made         = $_POST['made'];
    $image        ="";// $_POST['image'];
    $status       = $_POST['status'];
    $categ_ID     = $_POST['categ_ID'];
    $member_ID    = $_SESSION['UID'];

    $errors = array();

    if(empty($name)){$errors[]="item name is empty";}
    if(empty($price)){$errors[]="item price is empty";}
    if(empty($made)){$errors[]="item country made is empty";}
    if(empty($description)){$errors[]="item description is empty";}
    

    $name = filter_var($name,FILTER_SANITIZE_STRING);
    $description = filter_var($description,FILTER_SANITIZE_STRING);
    $price = filter_var($price,FILTER_SANITIZE_STRING);
    $made = filter_var($made,FILTER_SANITIZE_STRING);
      
    if(count($errors)){
      for($x=0;$x<count($errors);$x++){
        echo '<button class="alert alert-danger text-center col-sm-10" role="alert">'.$errors[$x].'</button><br>';
      }
    }else{
      $stat = $con->prepare('insert into items(name, description, price, add_date, country_made, image, status, categ_ID, member_ID)
      	                     values(:zname, :zdesc, :zprice,now(), :zmade,:zimage, :zstatus, :zcateg_id, :zmember_id )');
      $stat->execute(
      	array(
      		'zname'        	=>$name,
      		'zdesc'		    =>$description,
      		'zprice'	    =>$price,
      		'zmade'	        =>$made,
      		'zimage'    	=>$image,
      		'zstatus' 		=>$status,
          'zcateg_id'   	=>$categ_ID,
          'zmember_id'  	=>$member_ID
      		)
       );
      echo '<button class="alert alert-primary text-center col-sm-12" role="alert">Item '.$name.' Inserted</button><br>';
    }
 }
	?>
     <div class="container">
     	<h2 class="title_page">New Item</h2>
     	<div class="card new_item">
     		<div class="card-header bg-primary text-white">new item</div>
     		<div class="card-body">
     			<form class="row" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" >
     				<div class="col-sm-12 col-md-8">

     	    <div class="form-group row justify-content-center">
             	<label class=" col-sm-3">Name</label>
             	<div class="col-sm-8">
                 	<input type="text" name="name" class="form-control" required="required" placeholder="Enter item name">
               	</div>
             </div>

            <div class="form-group row justify-content-center">
               	<label class="col-sm-3 control-label">Description</label>
                <div class="col-sm-8 ">
                    <input type="text" name="description" class="form-control" required="required" placeholder="Enter Description">
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-sm-3 control-label">Price</label>
                <div class="col-sm-8">
                    <input type="text" name="price" class="form-control" required="required" placeholder="Enter price">
                </div>
            </div>


            <div class="form-group row justify-content-center">
                <label class="col-sm-3 control-label">country_made</label>
                <div class="col-sm-8">
                    <input type="text" name="made" class="form-control" required="required" placeholder="Enter country made">
                </div>
            </div>

           <!--
            <div class="form-group row justify-content-center">
                <label class="col-sm-3 control-label">image</label>
                <div class="col-sm-8">
                    <input type="text" name="image" class="form-control" required="required" placeholder="Enter image">
                </div>
            </div>
          -->
            <div class="form-group row justify-content-center">
                <label class="col-sm-3 control-label">status</label>
                <div class="col-sm-8">
                    <select class=" form-control" name="status">
                        <option disabled selected>choose any item</option>
                        <option value="new">new</option>
                        <option value="old">old</option>
                        <option value="used">used</option>
                        <option value="new use">new use</option>
                        <option value="very old">very old</option>
                    </select>
                </div>
            </div>

            <div class="form-group row justify-content-center">
                <label class="col-sm-3 control-label">Categorie</label>
                <div class="col-sm-8">
                    <select class=" form-control" name="categ_ID">
                        <option disabled selected>choose any item</option>
                        <?php 
                        $stat = $con->prepare('select * from categories');
                        $stat->execute();
                        $rows = $stat->fetchAll();
                        foreach ($rows as $row) {
                              echo "<option value='".$row['CID'] ."'>".$row['Cname'] ."</option>"; 
                           }   
                            
                         ?>
                        
                    </select>
                </div>
            </div>
            <!--
            <div class="form-group row justify-content-center">
                <label class="col-sm-3 control-label">member</label>
                <div class="col-sm-8">
                    <select class=" form-control" name="member_ID">
                        <option disabled selected>choose any item</option>


                         <?php 

                        /* $stat = $con->prepare('select * from users');
                         $stat->execute();
                         $rows = $stat->fetchAll();

                        foreach ($rows as $row) {
                              echo "<option value='".$row['userID'] ."'>".$row['userName'] ."</option>"; 
                           }*/   
                            
                         ?>

                    </select>
                </div>
            </div>
           -->
            

            <div class="form-group row justify-content-center">
                <div class="col-sm-12">
                    <input type="submit" value="Insert" class=" btn btn-primary btn-block" />
                </div>
            </div>
     				</div>
     				<div class="col-sm-12 col-md-4">
     				   <div class="item_box">
     				   	<span class="price_tage">$200</span>
     				   	<img width="200" height="200" class="img-responsive" src="data/site_pic/User_undefine.png" alt="">
     				   	<div class="caption">
     				   		<h4>Title</h4>
     				   		<p>this is description</p>
     				   	</div>
     				   </div>
     				</div>

     			</form>
     		</div>
     	</div>
     </div>

	<?php
}else{
   echo '<button class="alert alert-danger text-center col-sm-10" role="alert">Sorry you denied for access this page</button><br>';
}


include $temp.'footer.php';
include $temp.'footer.php';
?>