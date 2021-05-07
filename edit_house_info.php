<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php
$currentHouse = getCurrentHouse($_GET["id"]);
$allHouseInformation = getAllHouseInformation($_GET["id"]);

if(isset($_POST["submit"])){

  saveHouseInformation($_POST["houses_id"],$_POST["tempurator"],$_POST["moisture"],$_POST["description"]);

}

if($_GET["id"] == ""){
  $txtHead = "เพิ่ม โรงเรือน";
}else{
  $txtHead = "แก้ไข โรงเรือน";
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
            <input type="hidden" class="form-control" name="houses_id" value="<?php echo $currentHouse["hid"];?>">
            <div class="row">
              <div class="col-md-8">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">รายละเอียดโรงเรือน</h4>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">ชื่อโรงเรือน : <?php echo $currentHouse["house_name"];?></label>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">รายละเอียดโรงเรือน : <?php echo $currentHouse["house_detail"];?></label>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">ประเภทโรงเรือน : <?php echo $currentHouse["age_name"];?></label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">อาหารที่ใช้ : <?php echo $currentHouse["food_name"];?></label>
                        </div>
                      </div>
                    </div>
                    <legend>รายละเอียดโรงเรือน</legend><br>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">อุณหภูมิ <span style="color:red">*</span></label>
                          <input type="text" class="form-control" name="tempurator" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">ความชื้น <span style="color:red">*</span></label>
                          <input type="text" class="form-control" name="moisture" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">หมายเหตุ<span style="color:red">*</span></label>
                          <textarea class="form-control" name="description" rows="4"></textarea>
                        </div>
                      </div>
                    </div>
                    <legend>ข้อมูล</legend><br>
                    <div class="row">
                      <div class="col-md-12">
                        <table class="table">
                          <thead class=" text-primary">
                            <th>อุณหภูมิ</th>
                            <th>ความชื้น</th>
                            <th>หมายเหตุ</th>
                            <th>วันที่</th>
                          </thead>
                          <tbody>
                            <?php if(empty($allHouseInformation)){ ?>
                            <?php }else{?>
                              <?php foreach($allHouseInformation as $data){ ?>
                                <tr>
                                  <td><?php echo $data["tempurator"];?></td>
                                  <td><?php echo $data["moisture"];?></td>
                                  <td><?php echo $data["description"];?></td>
                                  <td><?php echo formatDateFull($data["update_date"]);?></td>
                                </tr>
                              <?php } ?>
                            <?php } ?>


                          </tbody>
                        </table>
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
