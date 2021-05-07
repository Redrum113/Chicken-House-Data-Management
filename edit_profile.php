<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php
$currentUser = getCurrentUser($_GET["id"]);
if(isset($_POST["submit"])){

  editProfile($_POST["id"],$_POST["firstname"],$_POST["lastname"],$_POST["address"],$_POST["telephone"],$_POST["email"],$_POST["status"],$_POST["username"],$_POST["password"],$_FILES["profile"]["name"]);
    
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
            <input type="hidden" class="form-control" name="id" value="<?php echo $currentUser["id"];?>">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">แก้ไขข้อมูลส่วนตัว</h4>
                  <p class="card-category">รายละเอียด</p>
                </div>
                <div class="card-body">
                  
                    <legend>โปรดระบุข้อมูล</legend><br>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">ชื่อ <span style="color:red">*</span></label>
                          <input type="text" class="form-control" name="firstname" value="<?php echo $currentUser["firstname"];?>" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">นามสกุล <span style="color:red">*</span></label>
                          <input type="text" class="form-control" name="lastname" value="<?php echo $currentUser["lastname"];?>" required>
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">ที่อยู่ <span style="color:red">*</span></label>
                          <input type="text" class="form-control" name="address" value="<?php echo $currentUser["address"];?>" required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">หมายเลขโทรศัพท์ <span style="color:red">*</span></label>
                          <input type="text" class="form-control" name="telephone" value="<?php echo $currentUser["telephone"];?>" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">อีเมล์</label>
                          <input type="text" class="form-control" name="email" value="<?php echo $currentUser["email"];?>">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <select name="status" class="form-control" required>
                            <option value="">-- โปรดระบุสถานะ --</option>
                            <option value="1" <?php if($currentUser['status'] == 1){ ?> selected<?php } ?>>ผู้ดูแลระบบ</option>
                            <option value="2" <?php if($currentUser['status'] == 2){ ?> selected<?php } ?>>พนักงาน</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="file" class="form-control" name="profile" placeholder="รูปประจำตัว" >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">ชื่อผู้ใช้งาน <span style="color:red">*</span></label>
                          <input type="text" class="form-control" name="username" value="<?php echo $currentUser["username"];?>" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">รหัสผ่าน <span style="color:red">*</span></label>
                          <input type="password" class="form-control" name="password" value="<?php echo $currentUser["password"];?>" required>
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
                  <?php if($currentEmployee['image'] == ""){ ?>
                  <img class="img" src="image/ico_emp.png" />
                  <?php }else{ ?>
                  <img class="img" src="image/employee/<?php echo $currentEmployee["image"];?>" />
                  <?php } ?>
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
