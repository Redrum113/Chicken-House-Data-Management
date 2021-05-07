<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php
$currentChicken = getCurrentChicken($_GET["id"]);
$allChickenInfo = getAllChickenInfo($_GET["id"]);

$type_map = array( 1=>'<a style="color:red">พ่อพันธุ์</a>',2=>'<a style="color:green">แม่พันธุ์</a>');
$sex_map = array( 1=>'<a style="color:red">เพศผู้</a>',2=>'<a style="color:green">เพศเมีย</a>');
$status_map = array( 1=>'<a style="color:green">ปกติ</a>',2=>'<a style="color:red">ปลดประจำการ</a>');
$status_info_map = array( 1=>'<a style="color:green">ปกติ</a>',2=>'<a style="color:blue">ป่วย</a>',3=>'<a style="color:red">ตาย</a>');

if(isset($_POST["submit"])){

    saveChickenInfo($_POST["chickens_id"],$_POST["chest"],$_POST["weight"],$_POST["status"],$_POST["update_date"]);
  

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
            <input type="hidden" class="form-control" name="chickens_id" value="<?php echo $currentChicken["cid"];?>">
            <div class="row">
              <div class="col-md-8">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">รายละเอียดไก่</h4>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">รหัสไก่ : <?php echo $currentChicken["chicken_number"];?></label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">สายพันธุ์ : <?php echo $currentChicken["breed_name"];?></label>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">วันที่ฟักออกจากไข่ : <?php echo formatDateFull($currentChicken["date_egg"]);?></label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">วันที่รับไก่เข้ามา : <?php echo formatDateFull($currentChicken["date_receive"]);?></label>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">ประเภทของไก่ : <?php echo $type_map[$currentChicken["date_receive"]];?></label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">เพศ : <?php echo $sex_map[$currentChicken["chicken_sex"]];?></label>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">โรงเรือน : <?php echo $currentChicken["house_name"];?></label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">กรงไก่ : <?php echo $currentChicken["coop_id"];?></label>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">สถานะของไก่ : <?php echo $status_map[$currentChicken["status"]];?></label>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">วันที่ปลดประจำการ : <?php echo formatDateFull($currentChicken["date_expired"]);?></label>
                        </div>
                      </div>
                    </div>

                    <hr/>

                    <legend>ข้อมูล</legend>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">รอบอก(ซม.)</label>
                          <input type="text" class="form-control" name="chest" >
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">น้ำหนัก(กก.)</label>
                          <input type="text" class="form-control" name="weight">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="bmd-label-floating">สถานะ</label>
                          <select name="status" class="form-control" required>
                            <option value="">-- โปรดระบุสถานะ --</option>
                            <option value="1">ปกติ</option>
                            <option value="2">ป่วย</option>
                            <option value="3">ตาย</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <?php 
                            $yThai = date("Y")+543;
                            $dateNow = date("d/m/").$yThai;
                          ?>
                          <label class="bmd-label-floating">วันที่บันทึก</label>
                          <input type="text" class="form-control" name="update_date" value="<?php echo $dateNow;?>" readonly>
                        </div>
                      </div>
                    </div>

                    

                    <div class="row">
                      <div class="col-md-12">
                        <table class="table" >
                          <thead class=" text-primary">
                            <th>รอบอก</th>
                            <th>น้ำหนัก</th>
                            <th>สถานะ</th>
                            <th>วันที่บันทึก</th>
                          </thead>
                          <tbody>
                            <?php if(empty($allChickenInfo)){ ?>
                            <?php }else{?>
                              <?php foreach($allChickenInfo as $data){ ?>
                                <tr>
                                  <td><?php echo $data["chest"];?></td>
                                  <td><?php echo $data["weight"];?></td>
                                  <td><?php echo $status_info_map[$data["status"]];?></td>
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


      <script>

        $('#date_egg').datetimepicker({
          lang:'th',
          timepicker:false,
          format:'d/m/Y'
        });
        $('#date_receive').datetimepicker({
          lang:'th',
          timepicker:false,
          format:'d/m/Y'
        });
        $('#date_expired').datetimepicker({
          lang:'th',
          timepicker:false,
          format:'d/m/Y'
        });

      </script>

      <?php
      require_once("footer.php");
      ?>

    </div>
  </div>


</body>

</html>
