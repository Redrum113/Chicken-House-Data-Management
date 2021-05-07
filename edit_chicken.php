<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php
$currentChicken = getCurrentChicken($_GET["id"]);
$numberChicken = runNumberChicken();
$allFatherType = getAllParrentType(1);
$allMotherType = getAllParrentType(2);
$allBreed = getAllBreed();
$allAge = getAllAge();
$allHouse = getAllHouse();
if(isset($_POST["submit"])){
  if($_POST["id"] == ""){
    saveChicken($_POST["chicken_number"],$_POST["breeds_id"],$_POST["date_egg"],$_POST["date_receive"],$_POST["chicken_type"],$_POST["chicken_sex"],$_POST["houses_id"],$_POST["coop_id"],$_POST["status"],$_POST["date_expired"],$_POST["father_id"],$_POST["mother_id"],$_POST["year_import"],$_POST["number_import"]);
  }else{
    editChicken($_POST["id"],$_POST["chicken_number"],$_POST["breeds_id"],$_POST["date_egg"],$_POST["date_receive"],$_POST["chicken_type"],$_POST["chicken_sex"],$_POST["houses_id"],$_POST["coop_id"],$_POST["status"],$_POST["date_expired"],$_POST["father_id"],$_POST["mother_id"],$_POST["year_import"],$_POST["number_import"]);
  }

}

if($_GET["id"] == ""){
  $txtHead = "เพิ่ม ข้อมูลไก่";
}else{
  $txtHead = "แก้ไข ข้อมูลไก่";
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
            <input type="hidden" class="form-control" name="id" value="<?php echo $currentChicken["cid"];?>">
            <div class="row">
              <div class="col-md-8">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title"><?php echo $txtHead;?></h4>
                    <p class="card-category">รายละเอียด</p>
                  </div>
                  <div class="card-body">

                    <legend>โปรดระบุข้อมูล</legend><br>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">รหัสไก่</label>
                          <input type="text" class="form-control" name="chicken_number" value="<?php if($_GET['id'] == ""){ echo $numberChicken;}else{echo $currentChicken["chicken_number"];}?>" readonly>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">สายพันธุ์ <span style="color:red">*</span></label>
                          <select name="breeds_id" class="form-control border-input" id="ages_id">
                            <option value="">-- โปรดเลือกประเภท --</option>
                            <?php foreach($allBreed as $dataBreed){ ?>
                              <?php $selected = ""; 
                              if($currentChicken['breeds_id'] == $dataBreed['id']){
                                $selected = " selected"; 

                              } 
                              ?> 
                              <option value="<?php echo $dataBreed['id']?>" <?php echo $selected;?>><?php echo $dataBreed['breed_name']?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">วันที่ฟักออกจากไข่</label>
                          <input type="text" class="form-control" name="date_egg" id="date_egg" value="<?php echo formatDateFull($currentChicken["date_egg"]);?>" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">วันที่รับไก่เข้ามา</label>
                          <input type="text" class="form-control" name="date_receive" id="date_receive" value="<?php echo formatDateFull($currentChicken["date_receive"]);?>" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">ประเภทของไก่</label>
                          <select name="chicken_type" class="form-control" required>
                            <option value="">-- โปรดระบุประเภทของไก่ --</option>
                            <option value="1" <?php if($currentChicken['status'] == 1){ ?> selected<?php } ?>>ไก่ไข่</option>
                            <option value="2" <?php if($currentChicken['status'] == 2){ ?> selected<?php } ?>>ไก่พันธุ์</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">เพศ</label>
                          <select name="chicken_sex" class="form-control" required>
                            <option value="">-- โปรดระบุเพศ --</option>
                            <option value="1" <?php if($currentChicken['status'] == 1){ ?> selected<?php } ?>>เพศผู้</option>
                            <option value="2" <?php if($currentChicken['status'] == 2){ ?> selected<?php } ?>>เพศเมีย</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">โรงเรือน <span style="color:red">*</span></label>
                          <select name="houses_id" class="form-control border-input" id="houses_id">
                            <option value="">-- โปรดเลือกโรงเรือน --</option>
                            <?php foreach($allHouse as $dataHouse){ ?>
                              <?php $selected = ""; 
                              if($currentChicken['houses_id'] == $dataHouse['id']){
                                $selected = " selected"; 

                              } 
                              ?> 
                              <option value="<?php echo $dataHouse['id']?>" <?php echo $selected;?>><?php echo $dataHouse['house_name'];?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">กรงไก่ <span style="color:red">*</span></label>
                          <select name="coop_id" class="form-control border-input" id="foods_id">
                            <option value="">-- โปรดเลือกกรงไก่ --</option>
                            <?php for ($x = 1; $x <= 100; $x++) { ?>
                              <?php $selected = ""; 
                              if($currentChicken['coop_id'] == $x){
                                $selected = " selected"; 

                              } 
                              ?> 
                              <option value="<?php echo $x;?>" <?php echo $selected;?>><?php echo $x;?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">สถานะของไก่ <span style="color:red">*</span></label>
                          <select name="status" class="form-control" required>
                            <option value="">-- โปรดระบุสถานะ --</option>
                            <option value="1" <?php if($currentChicken['status'] == 1){ ?> selected<?php } ?>>ปกติ</option>
                            <option value="2" <?php if($currentChicken['status'] == 2){ ?> selected<?php } ?>>ปลดประจำการ</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">วันที่ปลดประจำการ <span style="color:red">*</span></label>
                          <input type="text" class="form-control" name="date_expired" id="date_expired" value="<?php echo $currentHouse["house_name"];?>" >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">พ่อพันธุ์ </label>
                          <select name="father_id" class="form-control border-input" id="houses_id">
                            <option value="">-- โปรดเลือก --</option>
                            <?php foreach($allFatherType as $dataFather){ ?>
                              <?php $selected = ""; 
                              if($currentChicken['father_id'] == $dataFather['id']){
                                $selected = " selected"; 

                              } 
                              ?> 
                              <option value="<?php echo $dataFather['id']?>" <?php echo $selected;?>><?php echo $dataFather['parents_number'];?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">แม่พันธุ์ </label>
                          <select name="mother_id" class="form-control border-input" id="foods_id">
                            <option value="">-- โปรดเลือก --</option>
                              <?php foreach($allMotherType as $dataMother){ ?>
                                <?php $selected = ""; 
                                if($currentChicken['mother_id'] == $dataMother['id']){
                                  $selected = " selected"; 

                                } 
                                ?> 
                              <option value="<?php echo $dataMother['id']?>" <?php echo $selected;?>><?php echo $dataMother['parents_number'];?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">ปี</label>
                          <input type="text" class="form-control" name="year_import" id="year_import" value="<?php echo date("Y")+543;?>" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">ล็อต</label>
                          <input type="text" class="form-control" name="number_import" id="number_import" value="<?php echo $currentChicken["number_import"];?>" required>
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
