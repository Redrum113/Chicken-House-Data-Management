<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php
$allBreed = getAllBreed();
if (isset($_GET['delete'])) {
  deleteBreed($_GET['delete']);
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
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">แสดง / ลบข้อมูลสายพันธุ์ไก่</h4>
                  <p class="card-category">ข้อมูลสายพันธุ์ไก่ทั้งหมด</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                  <br><br>
                    <a href="edit_breed.php" class="btn btn-success"><i class="ti-plus"></i> เพิ่ม</a>
                    <br><br>
                    <table class="table">
                      <thead class=" text-primary">
                        <th>รหัส</th>
                        <th>ชื่อสายพันธุ์ไก่</th>
                        <th></th>
                        <th></th>
                      </thead>
                      <tbody>
                        <?php if (empty($allBreed)) { ?>
                          <?php echo "<h3>ไม่พบข้อมูล</h3>"; ?>
                        <?php } else { ?>
                          <?php foreach ($allBreed as $data) { ?>
                            <tr>
                              <td><?php echo $data["id"]; ?></td>
                              <td><?php echo $data["breed_name"]; ?></td>
                              <td style="width:5%;">
                                <a href="edit_breed.php?id=<?php echo $data["id"]; ?>" class="btn btn-warning">แก้ไข</a>
                              </td>
                              <!-- <td style="width:5%;">
                                <a href="?delete=<?php echo $data['id']; ?>" class="btn btn-danger" onClick="javascript: return confirm('ยืนยันการลบ');">ลบ</a>
                              </td> -->
                            </tr>
                          <?php } ?>
                        <?php } ?>


                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>

      <?php
      require_once("footer.php");
      ?>

    </div>
  </div>


</body>

</html>