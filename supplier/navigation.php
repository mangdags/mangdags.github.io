<nav class="navbar bg-light fixed-top">
  <div class="container">
    <a class="navbar-brand" href="index.php" style="font-size: 2em; font-family: sans-serif;"> <img src="asset/images/logo.png" style="width:40px; height: 40px;"> ISESA</a>
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
            <a class="nav-link active" aria-current="page" href=""> <i class="fa fa-user"></i> <label style="  font-weight: bold; color: green;">   Hi! <?php echo $_SESSION['firstname']?> </label></a>
          </li>
          <li id="links" class="nav-item">
            <a class="nav-link active" href="index.php"> <i class="fa fa-home"></i> Home</a>
          </li>
          <li id="links" class="nav-item">
            <a class="nav-link active" href="supplies.php"> <i class="fa fa-handshake-o"></i> Supplies</a>
          </li>
          <li id="links" class="nav-item">
            <a class="nav-link active" href="gallery.php"> <i class="fas fa-images"></i> Gallery</a>
          </li>
          <li id="links" class="nav-item">
            <a class="nav-link active" href="services.php"> <i class="fas fa-cog"></i> Services</a>
          </li>
          <li id="links" class="nav-item">
            <a class="nav-link active" href="offer.php"> <i class="fas fa-list"></i> Offer</a>
          </li>
          <li id="links" class="nav-item">
            <a class="nav-link active" href="reserved.php"> <i class="fas fa-list"></i> Reserved</a>
          </li>
          <li id="links" class="nav-item">
            <a class="nav-link active" href="messages.php"> <i class="fas fa-sms"></i> Messages</a>
          </li>
            <a class="nav-link dropdown-toggle active" href="bookings.php" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <i class="fa fa-calendar"></i>
              Bookings
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="pending_bookings.php">Pending Bookings</a></li>
              <li><a class="dropdown-item" href="approved_bookings.php">Approved Bookings</a></li>
              <li><a class="dropdown-item" href="reject_bookings.php">Reject Bookings</a></li>
            </ul>
          </li>

          <li id="links" class="nav-item">
            <a class="nav-link active" href="logout.php"> <i class="fa fa-sign-out"></i> Log Out</a>
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