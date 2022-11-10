<?php
  include_once("asset/include/config.php");
?>

<style>
.dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 260px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {background-color: #ddd;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #3e8e41;}
</style>

<nav class="navbar bg-light fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="font-size: 2em; font-family: sans-serif;"> <img src="asset/images/logo.png" style="width:40px; height: 40px;"> ISESA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">ISESA</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li id="links" class="nav-item">
            <li id="links" class="nav-item">
            <a class="nav-link active" data-bs-toggle="modal" data-bs-target="#account"> <i class="fa fa-user"></i> <label style="  font-weight: bold; color: green;">   Hi! <?php echo $_SESSION['firstname']?> </label></a>
          </li>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell"></i> Notifications 
                <?php
                  $query = "SELECT * FROM `notifications` WHERE `status` = 'unread' ORDER BY `date` DESC";
                  if(count(fetchAll($query))>0){
                ?>
                  <span><?php echo count(fetchAll($query)); ?></span>
                <?php
                  }
                ?>
            </a>

            <div class="dropdown" >
                <?php
                  $query = "SELECT * FROM `notifications` WHERE `status` = 'unread' ORDER BY `date` DESC";
                    if(count(fetchAll($query)) > 0) {
                      foreach(fetchAll($query) as $i){
                ?>
                <a style ="
                  <?php
                    if($i['status']=='unread'){
                      echo "font-weight:bold;";
                    }
                  ?>
                " class="dropdown-content" href="users.php?id=<?php echo $i['notif_id'] ?>">
                <small><i><?php echo date('F j, Y, g:i a',strtotime($i['date'])) ?></i></small><br/>
                <?php 
                    if($i['type']=='approval'){
                        echo "Pending approval";
                    }
                ?>
                </a>
              <div class="dropdown-divider"></div>
                <?php
                    }
                 }else{
                 }
                ?>
            </div>
          </li>
        </ul>
        </li>
          <li id="links" class="nav-item">
            <a class="nav-link active" aria-current="page" href="home.php"> <i class="fa fa-home"></i> Home</a>
          </li>
          <li id="links" class="nav-item">
            <a class="nav-link active" href="users.php"><i class="fa fa-users" aria-hidden="true"></i> Users</a>
          </li>
          <li id="links" class="nav-item">
            <a class="nav-link active" href="manageevents.php"><i class="fa fa-calendar" aria-hidden="true"></i> Manage Events</a>
          </li>
           <li id="links" class="nav-item">
            <a class="nav-link active" href="terms_condition.php"><i class="fas fa-file-alt" aria-hidden="true"></i> Terms & Condition</a>
          </li>
          
          <li id="links" class="nav-item">
            <a class="nav-link active" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
          </li>
          
         
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </div>
</nav>