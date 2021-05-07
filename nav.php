<?php
$user = getUser($_SESSION["id"]);
if (isset($_GET['logout'])) {
  logout();
}

?>
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
  <div class="container-fluid">
    <div class="navbar-wrapper">
      <span>
        <a class="navbar-brand" href="#pablo">
          <h2><b>Data management system for poultry farming</b></h2>
        </a>
      </span>
    </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <?php if ($_SESSION["id"] != "" || $_SESSION["id"] != "") { ?>
        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="material-icons">person</i>
              <p class="d-lg-none d-md-block">
                Account
              </p>
              <?php echo $user["firstname"]; ?> <?php echo $user["lastname"]; ?>

            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
              <!--<a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>-->
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="edit_profile.php?id=<?php echo $_SESSION["id"]; ?>">แก้ไขข้อมูลส่วนตัว</a>
              <a class="dropdown-item" href="?logout=true">Log out</a>
            </div>
          </li>
        </ul>
      <?php } ?>

    </div>
  </div>
</nav>