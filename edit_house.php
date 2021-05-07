<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php
$currentHouse = getCurrentHouse($_GET["id"]);
$allAge = getAllAge();
$allFood = getAllFood();
if(isset($_POST["submit"])){
  if($_POST["id"] == ""){
    saveHouse($_POST["house_name"],$_POST["house_detail"],$_POST["ages_id"],$_POST["foods_id"]);
  }else{
    editHouse($_POST["id"],$_POST["house_name"],$_POST["house_detail"],$_POST["ages_id"],$_POST["foods_id"]);
  }
  

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
            <input type="hidden" class="form-control" name="id" value="<?php echo $currentHouse["hid"];?>">
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
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">ชื่อโรงเรือน <span style="color:red">*</span></label>
                          <input type="text" class="form-control" name="house_name" value="<?php echo $currentHouse["house_name"];?>" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">รายละเอียดโรงเรือน<span style="color:red">*</span></label>
                          <textarea class="form-control" name="house_detail" rows="4"><?php echo $currentHouse["house_detail"];?></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">ประเภทโรงเรือน <span style="color:red">*</span></label>
                          <select name="ages_id" class="form-control border-input" id="ages_id">
                            <option value="">-- โปรดเลือกประเภท --</option>
                            <?php foreach($allAge as $dataAge){ ?>
                              <?php $selected = ""; 
                              if($currentHouse['ages_id'] == $dataAge['id']){
                                $selected = " selected"; 

                              } 
                              ?> 
                              <option value="<?php echo $dataAge['id']?>" <?php echo $selected;?>><?php echo $dataAge['age_name']?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">อาหารที่ใช้ <span style="color:red">*</span></label>
                          <select name="foods_id" class="form-control border-input" id="foods_id">
                            <option value="">-- โปรดเลือกประเภท --</option>
                            <?php foreach($allFood as $dataFood){ ?>
                              <?php $selected = ""; 
                              if($currentHouse['foods_id'] == $dataFood['id']){
                                $selected = " selected"; 

                              } 
                              ?> 
                              <option value="<?php echo $dataFood['id']?>" <?php echo $selected;?>><?php echo $dataFood['food_name']?></option>
                            <?php } ?>
                          </select>
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
