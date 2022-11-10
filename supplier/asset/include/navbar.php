<nav class="navbar  fixed-top">
  <div class="container" style="justify-content: unset;">
    <a class="navbar-brand" href="#" style="font-size: 2em; font-family: sans-serif;"> <img src="asset/images/logo.png" style="width:40px; height: 40px;"> ISESA</a>
    <div style="width: 100%;">
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" style="float: right;" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
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
            <a class="nav-link active" aria-current="page" href="#"> <i class="fas fa-home"></i> Home</a>
          </li>
          <li id="links" class="nav-item">
            <a class="nav-link active" href="#"><i class="fas fa-question"></i> Help</a>
          </li>
          <li id="links" class="nav-item">
            <a class="nav-link active" href="#"><i class="fa fa-calendar" aria-hidden="true"></i> Book Events</a>
          </li>
          <li id="links" class="nav-item">
            <a class="nav-link active" href="gallery.php"><i class="fa fa-calendar" aria-hidden="true"></i> Gallery</a>
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