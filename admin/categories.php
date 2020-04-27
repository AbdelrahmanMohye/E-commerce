<?php
ob_start();
session_start();
if(isset($_SESSION['username'])){
	$TP ='Categories';
  include 'init.php';

  
  $do =isset($_GET['do'])?$_GET['do']:'Manage';
  


 if($do == 'Manage'){
    
    $stat=$con->prepare('select * from categories');
    $stat->execute();
    $categs=$stat->fetchAll();
    ?>
    <div class="container categs_details">
    	<h2 class="title_page">Manage Categories</h2>
    	<div class="list-group">
    		<div class="list-group-item active">Manage Categories</div>

    		
    		<?php
              foreach ($categs as $categ) {
              	echo '<div class="list-group-item notActive">
                      
                      <h5>'.$categ['Cname'].'</h5>
                      <p>'.$categ['Cdescription'].'</p>
                      <div class="group_button">
                      ';
                         if(empty($categ['Cdescription'])){
                         	echo '<p>This description is empty</p>';
                         }

                         if(!$categ['Cvisible']){
                         	echo ' <span class="btn btn-sm btn-success">Visible</span>';
                         }

                         if(!$categ['Ccomment']){
                         	echo ' <span class="btn btn-sm btn-danger">Allow_Commend</span>';
                         }

                         if(!$categ['Cads']){
                         	echo ' <span class="btn btn-sm btn-primary">Allow_Ads</span>';
                         }

                         echo "
                         <div class='hidden_button'>
                         	<a href='?do=Edit&id=".$categ['CID']."'><button class='btn btn-sm btn-success'><i class='fa fa-edit'></i> Edit</button></a>
                         	<a href='?do=Delete&id=".$categ['CID']."'><button class='btn btn-sm btn-danger'><span style='font-weight:bold'>x</span> Clear</button></a>
                         </div>
                         ";
                         
                     
              	echo '</div></div>';

              }
    		?>
    		
   		 </div>
       <br><a href="?do=Add"><button class="btn btn-primary" style="margin-bottom: 30px;"><i class="fa fa-plus"></i> Add Categorie</button></a>
   	</div>
    <?php
    include $tmpl.'footer.php';
 }

 elseif($do == 'Delete'){
    $Gid = $_GET['id'];
    $stat = $con->prepare('delete from categories where CID = ?');
    $stat->execute(array($Gid));
    header('location:?do=Manage');
 }
 
 // Add new categories page
 elseif ($do == 'Add') {
   include 'AddCategories.php';
   include $tmpl.'footer.php';
 }

 // insert new categories page
 elseif($do == 'insert'){
    ?>
        <div class="container text-center">
        <h2 style="margin: 50px;color: #777" > Inset New Member</h2>
    <?php
    $Cname = $_POST['Cname'];
    $Cdescription = $_POST['Cdescription'];
    $Cordering = $_POST['Cordering'];
    $Cvisible = $_POST['Cvisible'];
    $Ccommend = $_POST['Ccommend'];
    $CAds = $_POST['CAds'];


    echo $Cname ." " . $Cdescription ." " .$Cordering. " " . $Cvisible." ". $Ccommend." ".$CAds;

    $errors = array();

    $stat = $con->prepare('select * from categories where Cname = ?');
    $stat->execute(array($Cname));
    $row =$stat->fetch();

    if(strlen($Cname) <= 2){$errors[]="categories name less than 3 charachters";}
    if($row > 0){$errors[]="categories name is Exist already";}

    $Cname = filter_var($Cname,FILTER_SANITIZE_STRING);
    $Cdescription = filter_var($Cdescription,FILTER_SANITIZE_STRING);
    $Cordering = filter_var($Cordering,FILTER_SANITIZE_STRING);
      
    if(count($errors)){
      for($x=0;$x<count($errors);$x++){
        echo '<button class="alert alert-danger text-center col-sm-10" role="alert">'.$errors[$x].'</button><br>';
      }
    }else{
      $stat = $con->prepare('insert into categories(Cname, Cdescription, Corder, Cvisible, Ccomment, Cads, Cdate)
      	                     values(:zname, :zdesc, :zorder, :zvisible, :zcomment, :zads, now() )');
      $stat->execute(
      	array(
      		'zname'     =>$Cname,
      		'zdesc'		=>$Cdescription,
      		'zorder'	=>$Cordering,
      		'zvisible'	=>$Cvisible,
      		'zcomment'	=>$Ccommend,
      		'zads'		=>$CAds
      		)
       );

      echo '<button class="alert alert-primary text-center col-sm-10" role="alert">Categorie '.$Cname.' Inserted</button><br>';
    }
    echo "</div>";
    include $tmpl.'footer.php';
 }
 
 // Edit categories info
 elseif($do == 'Edit'){
    $Gid = $_GET['id'];
    $stat = $con->prepare('select * from categories where CID = ?');
    $stat->execute(array($Gid));
    $rows = $stat->fetch();
    $cnt = $stat->rowCount();
    
    if($cnt){
 	include 'EditCategs.php';
    include $tmpl.'footer.php';
    }
}

// update categories info
elseif($do == 'update'){
    ?>
    <div class="container text-center">
        <h2 class="title_page" > Update Member Info</h2>
        
    <?php
     if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $Cname = $_POST['Cname'];
    	$Cdescription = $_POST['Cdescription'];
    	$Cordering = $_POST['Cordering'];
    	$Cvisible = $_POST['Cvisible'];
    	$Ccommend = $_POST['Ccommend'];
    	$CAds = $_POST['CAds'];



        
       
            $stat = $con->prepare('update categories set Cname = ?,Cdescription = ?, Corder = ?, Cvisible = ? , Ccomment = ?, Cads = ? where CID = ?');
            $stat->execute(array($Cname, $Cdescription, $Cordering, $Cvisible,$Ccommend,$CAds , $_POST['id']));
            ?>
            <button class="alert alert-primary" role="alert"><?php echo $stat->rowCount()." item has updated"; ?></button>
            <?php
        
   
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