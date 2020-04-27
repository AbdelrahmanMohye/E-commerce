<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
  <a class="navbar-brand" href="dashboard.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link <?php if($TP == 'Categories') echo 'active';?>" href="Categories.php?">Categories</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link <?php if($TP == 'Items') echo 'active';?>" href="items.php">Items</a>
      </li>
      <li class="nav-item ">
        <a class="nav-link <?php if($TP == 'Members') echo 'active';?>" href="members.php?do=Manage">Members</a>
      </li>
      <li class="nav-item">
        <a class="nav-link <?php if($TP == 'Statistics') echo 'active';?>" href="#">Statistics</a>
      </li>
      
      <li class="nav-item <?php if($TP == 'Logs') echo 'active';?>">
        <a class="nav-link" href="#">Logs</a>
      </li>
    </ul>
    <div class="navbar-nav dropdown dropdown-dark bg-dark">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <?php echo $_SESSION['username']; ?>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="members.php?do=Edit&id=<?php echo $_SESSION['ID']; ?>">Edit Member</a>
          <a class="dropdown-item" href="members.php?do=Manage">Setting</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="logout.php">Logout</a>
        </div>
      </div>
  </div>
</div>
</nav>