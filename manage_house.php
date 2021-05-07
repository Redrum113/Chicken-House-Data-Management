<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php
$allHouse = getAllHouse();
if (isset($_GET['delete'])) {
  deleteHouse($_GET['delete']);
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
                  <h4 class="card-title ">แสดง / ลบข้อมูลโรงเรือน</h4>
                  <p class="card-category">โรงเรือนทั้งหมด</p>
                </div>
                <div class="card-body">
                  <br>
                  <div align="center">
                    <tr>
                      <td>
                        <span style="text-align:center;"><a href="manage_house.php" class="btn btn-deleted">ข้อมูลโรงเรือน</a></span>
                      </td>
                      <td>
                      &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                      </td>
                      <td>
                        <span style="text-align:center;"><a href="manage_age.php" class="btn btn-deleted">ประเภทของโรงเรือน</a></span>
                      </td>
                    </tr>
                    
                  </div>

                  <div class="table-responsive">
                    <br><br>
                    <?php if ($_SESSION["status"] == 1) { ?>
                      <a href="edit_house.php" class="btn btn-success"><i class="ti-plus"></i> เพิ่ม</a>
                    <?php } ?>
                    <br><br>
                    <table class="table">
                      <thead class=" text-primary">
                        <th>ชื่อโรงเรือน</th>
                        <th>รายละเอียดโรงเรือน</th>
                        <th>ประเภทโรงเรือน</th>
                        <th>อาหารที่ใช้</th>
                        <th>วันที่อัพเดท</th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </thead>
                      <tbody>
                        <?php if (empty($allHouse)) { ?>
                          <?php echo "<h3>ไม่พบข้อมูล</h3>"; ?>
                        <?php } else { ?>
                          <?php foreach ($allHouse as $data) { ?>
                            <tr>
                              <td><?php echo $data["house_name"]; ?></td>
                              <td><?php echo $data["house_detail"]; ?></td>
                              <td><?php echo $data["age_name"]; ?></td>
                              <td><?php echo $data["food_name"]; ?></td>
                              <td><?php echo formatDateFull($data["update_date"]); ?></td>
                              <!-- <td style="width:5%;">
                                <a href="edit_house_info.php?id=<?php echo $data["id"]; ?>" class="btn btn-info">รายละเอียด</a>
                              </td> -->


                              <?php if ($_SESSION["status"] == 1) { ?>
                                <td style="width:5%;">
                                  <a href="edit_house.php?id=<?php echo $data["id"]; ?>" class="btn btn-warning">แก้ไข</a>
                                </td>

                              <?php } ?>

                              <td style="width:5%;">
                                <a href="edit_house_info.php?id=<?php echo $data["id"]; ?>" class="btn btn-info">รายละเอียด</a>
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