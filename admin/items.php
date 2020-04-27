<?php
ob_start();
session_start();
if(isset($_SESSION['username'])){
	$TP ='Items';
  include 'init.php';

  
  $do =isset($_GET['do'])?$_GET['do']:'Manage';
  


 if($do == 'Manage'){
    
    include 'manageItems.php'; 
  }

 elseif($do == 'Delete'){
    $Gid = $_GET['id'];
    $stat = $con->prepare('delete from items where item_ID = ?');
    $stat->execute(array($Gid));
    header('location:?do=Manage');
 }
 
 // Add new categories page
 elseif ($do == 'Add') {
   include 'AddItems.php';
   include $tmpl.'footer.php';
 }

 // insert new categories page
 elseif($do == 'insert'){
    ?>
        <div class="container text-center">
        <h2 style="margin: 50px;color: #777" > Inset New Member</h2>
    <?php
    $name         = $_POST['name'];
    $description  = $_POST['description'];
    $price        = $_POST['price'];
    $made         = $_POST['made'];
    $image        = $_POST['image'];
    $status       = $_POST['status'];
    $categ_ID     = $_POST['categ_ID'];
    $member_ID    = $_POST['member_ID'];

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
      		'zname'       =>$name,
      		'zdesc'		    =>$description,
      		'zprice'	    =>$price,
      		'zmade'	      =>$made,
      		'zimage'    	=>$image,
      		'zstatus' 		=>$status,
          'zcateg_id'   =>$categ_ID,
          'zmember_id'  =>$member_ID
      		)
       );

      echo '<button class="alert alert-primary text-center col-sm-10" role="alert">Categorie '.$name.' Inserted</button><br>';
    }
    echo "</div>";
    include $tmpl.'footer.php';
 }
 
 // Edit categories info
 elseif($do == 'Edit'){
    $Gid = $_GET['id'];
    
     $stat = $con->prepare('select items.* ,categories.* ,users.* from items inner join categories on items.categ_ID = categories.CID inner join users on items.member_ID = users.userID where item_ID = ?');
    $stat->execute(array($Gid));
    $rows = $stat->fetch();
    $cnt = $stat->rowCount();

    
    if($cnt){
 	  include 'EditItem.php';
    include $tmpl.'footer.php';
    }
}

// update categories info
elseif($do == 'update'){
    ?>
    <div class="container text-center">
        <h2 class="title_page" > Update Item Info</h2>
        
    <?php
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $id           = $_POST['id'];
        $name         = $_POST['name'];
        $description  = $_POST['description'];
        $price        = $_POST['price'];
        $made         = $_POST['made'];
        $image        = $_POST['image'];
        $status       = $_POST['status'];
        $categ_ID     = $_POST['categ_ID'];
        $member_ID    = $_POST['member_ID'];



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
            $stat = $con->prepare('update items set name = ?,description = ?, price = ?, country_made = ? , image = ?, status = ?, categ_ID = ?, member_ID = ? where item_ID = ?');
            $stat->execute(array($name, $description, $price, $made,$image,$status ,$categ_ID, $member_ID, $id));
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