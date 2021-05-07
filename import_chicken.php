<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
$allHouse = getAllHouse();
$allBreed = getAllBreed();
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
          <form action="function/csv_chicken.php" method="post" name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-8">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">นำเข้าข้อมูลไก่</h4>
                    <p class="card-category">รายละเอียด</p>
                  </div>
                  <div class="card-body">

                    <legend>โปรดระบุข้อมูล</legend><br>
                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">โรงเรือน <span style="color:red">*</span></label>
                          <select name="houses_id" class="form-control border-input" id="houses_id">
                            <option value="">-- โปรดเลือกโรงเรือน --</option>
                            <?php foreach ($allHouse as $dataHouse) { ?>
                              <?php $selected = "";
                              if ($currentChicken['houses_id'] == $dataHouse['id']) {
                                $selected = " selected";
                              }
                              ?>
                              <option value="<?php echo $dataHouse['id'] ?>" <?php echo $selected; ?>><?php echo $dataHouse['house_name']; ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">สายพันธุ์ <span style="color:red">*</span></label>
                          <select name="breeds_id" class="form-control border-input" id="ages_id">
                            <option value="">-- โปรดเลือกสายพันธุ์ --</option>
                            <?php foreach ($allBreed as $dataBreed) { ?>
                              <?php $selected = "";
                              if ($currentChicken['breeds_id'] == $dataBreed['id']) {
                                $selected = " selected";
                              }
                              ?>
                              <option value="<?php echo $dataBreed['id'] ?>" <?php echo $selected; ?>><?php echo $dataBreed['breed_name'] ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>

                    <br>
                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">ล็อต</label>
                          <input type="text" class="form-control" name="number_import" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">นำเข้าไฟล์ <span style="color:red">*</span></label>
                          <input type="file" name="file" class="form-control" id="file" accept=".xls,.xlsx" required>
                        </div>
                      </div>
                    </div>
                    <br>
                    <a href="function/import_chicken.xlsx">ไฟล์ CSV สำหรับการเพิ่มข้อมูลไก่</a>

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

                    <input type="submit" name="Import" class="btn btn-primary btn-round" value="บันทึก">
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