<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php
$currentAge = getCurrentAge($_GET["id"]);
if(isset($_POST["submit"])){
    if($_POST["id"] == ""){
        saveAge($_POST["age_name"]);
    }else{
        editAge($_POST["id"],$_POST["age_name"]);
    }
  
    
}

if($_GET["id"] == ""){
  $txtHead = "เพิ่ม ประเภทโรงเรือน";
}else{
  $txtHead = "แก้ไข ประเภทโรงเรือน";
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
            <input type="hidden" class="form-control" name="id" value="<?php echo $currentAge["id"];?>">
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
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">ประเภทโรงเรือน</label>
                          <input type="text" class="form-control" name="age_name" value="<?php echo $currentAge["age_name"];?>" required>
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
