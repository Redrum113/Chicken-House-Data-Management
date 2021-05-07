<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php
$allChicken = getAllChicken();
if (isset($_GET['delete'])) {
  deleteChicken($_GET['delete']);
}

$type_map = array(1 => '<a style="color:red">ไก่ไข่</a>', 2 => '<a style="color:green">ไก่พันธุ์</a>');
$sex_map = array(1 => '<a style="color:red">เพศผู้</a>', 2 => '<a style="color:green">เพศเมีย</a>');
$status_map = array(1 => '<a style="color:green">ปกติ</a>', 2 => '<a style="color:red">ปลดประจำการ</a>');



?>

<?php
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
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">แสดง / ลบข้อมูลไก่</h4>
                  <p class="card-category">ข้อมูลไก่ทั้งหมด</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <br>
                    <table style="width:100%">
                      <tr>
                        <td style="width:50%;">
                        </td>
                        <td style="width:50%;">
                          <input type="text" name="search" id="search" class="form-control border-input" onKeyup="filterSearchProductName();" placeholder="ค้นหาข้อมูล">
                        </td>
                      </tr>
                    </table>
                    <br>
                    <a href="edit_chicken.php" class="btn btn-success"><i class="ti-plus"></i> เพิ่มครั้งละตัว</a>
                    <a href="import_chicken.php?houses_id=<?php echo $_GET["houses_id"]; ?>" class="btn btn-info">เพิ่มครั่งละหลายตัวผ่าน CSV</a>
                    <br><br>
                    <table class="table" id="data_table">
                      <thead class=" text-primary">
                        <th>รหัสไก่</th>
                        <th>สายพันธุ์</th>
                        <!-- <th>วันที่ฟักออกจากไข่</th>
                        <th>วันที่รับไก่เข้ามา</th> -->
                        <th>ประเภท</th>
                        <th>เพศ</th>
                        <th>พ่อพันธุ์</th>
                        <th>แม่พันธุ์</th>
                        <th>โรงเรือน</th>
                        <th>กรงไก่</th>
                        <th>ปี/ล็อต</th>
                        <th>สถานะ</th>
                        <th></th>
                        <th></th>
                      </thead>
                      <tbody>
                        <?php if (empty($allChicken)) { ?>
                          <?php echo "<h3>ไม่พบข้อมูล</h3>"; ?>
                        <?php } else { ?>
                          <?php foreach ($allChicken as $data) { ?>
                            <?php
                            $currentParrentFa = getCurrentParrent($data["father_id"]);
                            $currentParrentMo = getCurrentParrent($data["mother_id"]);
                            ?>
                            <tr>
                              <td><?php echo $data["chicken_number"]; ?></td>
                              <td><?php echo $data["breed_name"]; ?></td>
                              <!-- <td><?php echo formatDateFull($data["date_egg"]); ?></td>
                              <td><?php echo formatDateFull($data["date_receive"]); ?></td> -->
                              <td><?php echo $type_map[$data["chicken_type"]]; ?></td>
                              <td><?php echo $sex_map[$data["chicken_sex"]]; ?></td>
                              <td><?php echo $currentParrentFa["parents_number"]; ?></td>
                              <td><?php echo $currentParrentMo["parents_number"]; ?></td>
                              <td><?php echo $data["house_name"]; ?></td>
                              <td><?php echo $data["coop_id"]; ?></td>
                              <td><?php echo $data["year_import"]; ?>/<?php echo $data["number_import"]; ?></td>
                              <td><?php echo $status_map[$data["status"]]; ?></td>

                              <?php if ($_SESSION["status"] == 1) { ?>
                                <td style="width:5%;">
                                  <a href="edit_chicken.php?id=<?php echo $data["id"]; ?>" class="btn btn-warning">แก้ไข</a>
                                </td>
                                <td style="width:5%;">
                                  <a href="?delete=<?php echo $data['id']; ?>" class="btn btn-danger" onClick="javascript: return confirm('ยืนยันการลบ');">ลบ</a>
                                </td>
                              <?php } ?>

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

      <script>
        function filterSearchProductName() {
          var input, filter, table, tr, td, i;
          input = document.getElementById("search");
          filter = input.value.toUpperCase();
          table = document.getElementById("data_table");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            td1 = tr[i].getElementsByTagName("td")[1];
            td2 = tr[i].getElementsByTagName("td")[2];
            if (td || td1 || td2) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1 || td1.innerHTML.toUpperCase().indexOf(filter) > -1 || td2.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
      </script>

      <?php
      require_once("footer.php");
      ?>

    </div>
  </div>


</body>

</html>