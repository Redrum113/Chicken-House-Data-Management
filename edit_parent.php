<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php

$numberParrent = runNumberParrent();
$currentParrent = getCurrentParrent($_GET["id"]);
if(isset($_POST["submit"])){
    if($_POST["id"] == ""){
      saveParrent($_POST["parents_number"],$_POST["parents_type"]);
    }else{
      editParrent($_POST["id"],$_POST["parents_number"],$_POST["parents_type"]);
    }
  
    
}

if($_GET["id"] == ""){
  $txtHead = "เพิ่ม พ่อพันธุ์/แม่พันธ์ุ";
}else{
  $txtHead = "แก้ไข พ่อพันธุ์/แม่พันธ์ุ";
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
            <input type="hidden" class="form-control" name="id" value="<?php echo $currentParrent["id"];?>">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title"><?php echo $txtHead;?></h4>
                  <p class="card-category">รายละเอียด</p>
                </div>

                <br><br>
                <div class="card-body">
                  
                    <legend>โปรดระบุข้อมูล</legend><br>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">รหัสพ่อพันธุ์/แม่พันธ์ุ</label>
                          <input type="text" class="form-control" name="parents_number" readonly value="<?php if($_GET["id"] == ""){ echo $numberParrent;}else{echo $currentParrent["parents_number"];}?>" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">ประเภท</label>
                          <select name="parents_type" class="form-control" required>
                            <option value="">-- โปรดระบุ --</option>
                            <option value="1" <?php if ($currentParrent['parents_type'] == 1) { ?> selected<?php } ?>>พ่อพันธุ์</option>
                            <option value="2" <?php if ($currentParrent['parents_type'] == 2) { ?> selected<?php } ?>>แม่พันธุ์</option>
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
