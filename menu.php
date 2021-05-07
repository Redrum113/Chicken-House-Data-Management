<div class="sidebar" data-color="purple" data-background-color="white" data-image="assets/img/sidebar-1.jpg">
  <div class="logo">
    <a href="#" class="simple-text logo-normal">
    <img src="image/logo1.png" alt="" height="100px" width="100px">
    <br>  
    <b>Menu</b>
    
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">

      <?php if ($_SESSION["id"] == "" || empty($_SESSION["id"])) { ?>
        <li class="nav-item">
          <a class="nav-link" href="index.php">
            <i class="material-icons">lock</i>
            <p>เข้าสู่ระบบ</p>
          </a>
        </li>

      <?php } else { ?>
        <?php if ($_SESSION["status"] == 1) { ?>
          <!-- <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <i class="material-icons">home</i>
              <p>หน้าหลัก</p>
            </a>
          </li> -->

          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <i class="material-icons">home</i>
              <p>บันทึกข้อมูลไก่และโรงเรือน</p>
            </a>
          </li>

          

          <li class="nav-item">
            <a class="nav-link" href="manage_breed.php">
              <i class="material-icons">lock</i>
              <p>ข้อมูลสายพันธุ์ไก่</p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="manage_food.php">
              <i class="material-icons">lock</i>
              <p>ข้อมูลอาหารไก่</p>
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link" href="manage_user.php">
              <i class="material-icons">person</i>
              <p>พนักงาน</p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="report.php">
              <i class="material-icons">dashboard</i>
              <p>รายงานสถิติ</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="report_egg.php">
              <i class="material-icons">printer</i>
              <p>ออกรายงาน</p>
            </a>
          </li>
        <?php } ?>


        <?php if ($_SESSION["status"] == 2) { ?>
          <li class="nav-item">
            <a class="nav-link" href="dashboard.php">
              <i class="material-icons">home</i>
              <p>หน้าหลัก</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="report.php">
              <i class="material-icons">dashboard</i>
              <p>รายงานสถิติ</p>
            </a>
          </li>

        <?php } ?>

      <?php } ?>




    </ul>
  </div>
</div>