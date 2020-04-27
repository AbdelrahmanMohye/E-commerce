<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse navbar_items" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
              <a class="nav-link active" href="index.php">Home</a>
      </li>
      <?php
      $STATE = $con->prepare('select * from categories');
      $STATE->execute();
      $ROWS = $STATE->fetchAll();
      foreach ($ROWS as $ROW){
         
         echo '
          <li class="nav-item">
              <a class="nav-link" href="show_categories.php?do='.$ROW["Cname"].'">
                '.ucfirst( $ROW['Cname'] ).'
                </a>
          </li>
          ';
       } 
      ?>
      
    </ul>
    <div class="navbar-nav dropdown dropdown-dark bg-dark" aria-haspopup="true">
        <?php
          if(isset($_SESSION['UserSESSION'])){
            echo '<a href="profile.php?mid='.$_SESSION['UID'].'"><img width="35" height="35" style="border-radius: 50%;" src="data/site_pic/User_undefine.png"></a>';
          }
        ?>
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        </a>

        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <?php 
             if(isset($_SESSION['UserSESSION'])){
          ?>
                 <a class="dropdown-item" href="New_Ads.php">New Item</a>
                 <a class="dropdown-item" href="">Setting</a>
          <?php
             }else{
          ?>
          <a class="dropdown-item" href="members.php?do=Edit&id=<?php echo $_SESSION['ID']; ?>">Edit Member</a>
          <a class="dropdown-item" href="members.php?do=Manage">Setting</a>
          <div class="dropdown-divider"></div>
          <?php 
           }
             if(isset($_SESSION['UserSESSION'])){
                  echo '<a class="dropdown-item" href="logout.php">Logout</a>';
             }else{
                  echo '<a class="dropdown-item" href="signup.php">login | signup</a>';
             }
          ?>
        </div>

      </div>
  </div>
</div>
</nav>