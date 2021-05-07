<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php
$currentKeep = getCurrentKeep($_GET["id"]);
$yThai = date("Y") + 543;
$dateNow = $yThai . date("-m-d");
$showtime = date("d-m-") . $yThai;
$dateshow = date("d-m-y");
if(isset($_POST["submit"])){

  editAmountEgg($_POST["id"],$_POST["amount_egg"], $_POST["update_date"], $_POST["users_edit_id"]);
    
}
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
          <form name="prduct_detail_form" action="" method="post" enctype="multipart/form-data">
            <input type="hidden" class="form-control" name="id" value="<?php echo $currentKeep["kid"];?>">
            <input type="hidden" class="form-control" name="users_edit_id" id="users_edit_id" value="<?php echo $_SESSION['id']; ?>">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">แก้ไขการเก็บไข่ไก่</h4>
                  <p class="card-category">รายละเอียด</p>
                </div>
                <div class="card-body">
                  
                    <legend>โปรดระบุข้อมูล</legend><br>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">โรงเรือน : <?php echo $currentKeep["house_name"];?></label>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">กรง : <?php echo $currentKeep["coop_id"];?></label>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">วันที่เก็บไข่ได้ : <?php echo formatDateFull($currentKeep["date_keep"]);?></label>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">จำนวนไข่</label>
                          <input type="text" class="form-control" name="amount_egg" value="<?php echo $currentKeep["amount_egg"];?>" required>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <?php 
                            $yThai = date("Y")+543;
                            $dateNow = date("d/m/").$yThai;
                          ?>
                          <label class="bmd-label-floating">วันที่แก้ไขล่าสุด</label>
                          <input type="text" class="form-control" name="update_date" value="<?php echo $dateNow;?>" readonly>
                        </div>
                      </div>
                    </div>
                    
                  <div class="clearfix"></div>
                
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card card-profile">
              <div class="card-avatar">
                <a href="#pablo">
                  <img class="img" src="image/ico_emp.png" />
                </a>
              </div>
              <div class="card-body">

                <input type="submit" name="submit" class="btn btn-primary btn-round" value="บันทึก">
                <input type="button" name="botton" class="btn btn-primary btn-round" onClick="javascript:history.go(-1)" value="ย้อนกลับ">
              </div>
            </div>
          </div>
        </div>
        </form>

      </div>
    </div>

    <?php
    require_once("footer.php");
    ?>

  </div>
</div>


</body>

</html>
