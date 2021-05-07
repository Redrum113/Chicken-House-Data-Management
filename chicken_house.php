<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php
$allHouse = getAllHouse();
?>
<body class="">
  <div class="wrapper ">
    <?php
    require_once("menu.php");
    ?>
    <div class="main-panel">
      <?php
      require_once("nav.php");
      ?>

      <div class="content">
        <div class="container-fluid">
          <div class="row"> 
            <?php if(empty($allHouse)){ ?>
              <?php echo "<h3>ไม่พบข้อมูล</h3>";?>
            <?php }else{?>
              <?php foreach($allHouse as $data){ ?>
                <div class="col-lg-3 col-sm-6">
                  <div class="card">
                    <a href="chicken_in_house.php?houses_id=<?php echo $data["id"];?>" style="text-align:center;">
                      <img src="image/data_ico.png" >
                      <hr />
                      <div class="stats">
                        <p style="text-align:center;"><a href="chicken_in_house.php?houses_id=<?php echo $data["id"];?>" class="btn btn-warning"><?php echo $data["house_name"];?></a></p>
                      </div>
                    </a>
                  </div>
                </div>
              <?php } ?>
            <?php } ?>
            

          </div>
        </div>
      </div>


      <?php
      require_once("footer.php");
      ?>

    </div>
  </div>


</body>

</html>
