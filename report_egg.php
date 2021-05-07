<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
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
          <form name="prduct_detail_form" action="pdf_egg.php" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">ค้นหาวันที่เก็บไข่</h4>
                  <p class="card-category">ค้นหาบันทึกการออกไข่ จากวันที่</p>
                </div>
                <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">โรงเรือน</label>
                          <select name="houses_id" class="form-control border-input" id="houses_id">
                            <option value="">-- โปรดระบุ --</option>
                            <?php foreach ($allHouse as $data) { ?>
                              <option value="<?php echo $data['id'] ?>"><?php echo $data['house_name'] ?></option>
                            <?php } ?>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">จากวันที่</label>
                          <input type="text" class="form-control" name="dateStart" id="dateStart" required>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="bmd-label-floating">ถึงวันที่</label>
                          <input type="text" class="form-control" name="dateEnd" id="dateEnd" required>
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

                <input type="submit" name="submit" class="btn btn-primary btn-round" value="ค้นหา">
                <input type="button" name="botton" class="btn btn-primary btn-round" onClick="javascript:history.go(-1)" value="ย้อนกลับ">
              </div>
            </div>
          </div>
        </div>
        </form>

      </div>
    </div>

    <script>
        $('#dateStart').datetimepicker({
          lang:'th',
          timepicker:false,
          format:'d/m/Y'
        });
        $('#dateEnd').datetimepicker({
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
