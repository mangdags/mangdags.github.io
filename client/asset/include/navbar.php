<nav class="navbar fixed-top">
  <div class="container" style="justify-content: unset;display: unset;">
    <a class="navbar-brand" href="index.php" style="font-size: 2em; font-family: sans-serif;"> <img src="asset/images/logo.png" style="width:40px; height: 40px;"> ISESA</a>
    <div style="float: right;margin-top: 10px;">
      <button class="navbar-toggler" type="button"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    </div>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">ISESA</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li id="links" class="nav-item">
            <li id="links" class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php"> <i class="fa fa-user"></i> <label style="  font-weight: bold; color: green;">   Hi! <?php echo $_SESSION['firstname']?> </label></a>
          </li>
            <a class="nav-link active" aria-current="page" href="index.php"> <i class="fa fa-home"></i> Home</a>
          </li>
          <li id="links" class="nav-item">
            <a class="nav-link active" href="#"><i class="fa fa-question"></i> Help</a>
          </li>
          <li id="links" class="nav-item">
            <a class="nav-link active" href="messages.php"><i class="fas fa-sms"></i> Messages</a>
          </li>
          <li id="links" class="nav-item">
            <a class="nav-link active" href="reserved.php"><i class="fas fa-list"></i> Reserved</a>
          </li>
          <li id="links" class="nav-item">
            <a class="nav-link active" href="terms_condition.php"><i class="fa fa-question"></i> Terms and Condition</a>
          </li>
          <li id="links" class="nav-item">
            <a class="nav-link active" href="book_event.php"><i class="fa fa-calendar" aria-hidden="true"></i> Book Events</a>
          </li>
          <li id="links" class="nav-item">
            <a class="nav-link active" href="my_event.php"><i class="fa fa-calendar" aria-hidden="true"></i> My Events</a>
          </li>
          <li id="links" class="nav-item">
            <a class="nav-link active" href="myprofile.php"><i class="fas fa-user"></i> Profile</a>
          </li>
          <li id="links" class="nav-item">
            <a class="nav-link active" href="logout.php"> <i class="fa fa-sign-in"></i> Log Out</a>
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