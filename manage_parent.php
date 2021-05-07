<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php
$allParrent = getAllParrent();
if (isset($_GET['delete'])) {
  deleteParrent($_GET['delete']);
}
$status_map = array(1 => '<a style="color:red">พ่อพันธุ์</a>', 2 => '<a style="color:green">แม่พันธุ์</a>');
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
                  <h4 class="card-title ">แสดง / ลบข้อมูลพ่อพันธุ์/แม่พันธุ์</h4>
                  <p class="card-category">ข้อมูลพ่อพันธุ์/แม่พันธุ์ทั้งหมด</p>
                </div>
                <div class="card-body">

                  <br>


                  <div class="table-responsive">

                    <a href="edit_parent.php" class="btn btn-success"><i class="ti-plus"></i> เพิ่ม</a>
                    <br><br>
                    <table class="table">
                      <thead class=" text-primary">
                        <th>รหัสพ่อพันธุ์/แม่พันธ์ุ</th>
                        <th>รหัส/สาย</th>
                        <th>ประเภท</th>
                        <th></th>
                      </thead>
                      <tbody>
                        <?php if (empty($allParrent)) { ?>
                          <?php echo "<h3>ไม่พบข้อมูล</h3>"; ?>
                        <?php } else { ?>
                          <?php foreach ($allParrent as $data) { ?>
                            <tr>
                              <td><?php echo $data["id"]; ?></td>
                              <td><?php echo $data["parents_number"]; ?></td>
                              <td><?php echo $status_map[$data["parents_type"]]; ?></td>


                              <?php if ($_SESSION["status"] == 1) { ?>
                                <td style="width:5%;">
                                  <a href="edit_parent.php?id=<?php echo $data["id"]; ?>" class="btn btn-warning">แก้ไข</a>
                                </td>
                              <?php } ?>

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