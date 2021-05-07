<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php
$allChickenInHouse = getAllChickenInHouse($_GET["houses_id"]);
$currentHouse = getCurrentHouse($_GET["houses_id"]);
if (isset($_GET['cancel'])) {
  updateStatusChicken($_GET['cancel']);
}

$type_map = array( 1=>'<a style="color:red">พ่อพันธุ์</a>',2=>'<a style="color:green">แม่พันธุ์</a>');
$sex_map = array( 1=>'<a style="color:red">เพศผู้</a>',2=>'<a style="color:green">เพศเมีย</a>');
$status_map = array( 1=>'<a style="color:green">ปกติ</a>',2=>'<a style="color:red">ปลดประจำการ</a>');
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
                  <h4 class="card-title ">แสดง / ลบข้อมูลไก่ใน <?php echo $currentHouse["house_name"];?></h4>
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
                          <input type="text" name="search" id="search" class="form-control border-input"  onKeyup="filterSearchProductName();" placeholder="ค้นหาข้อมูล">
                        </td>
                      </tr>
                    </table>
                    <br>
                    <a href="?cancel=<?php echo $_GET["houses_id"];?>" class="btn btn-danger" onClick="javascript: return confirm('ยืนยันปลดประจำการ');">ปลดประจำการไก่ทั้งหมด</a>
                    <br><br>
                    <table class="table" id="data_table">
                      <thead class=" text-primary">
                        <th>รหัสไก่</th>
                        <th>สายพันธุ์</th>
                        <th>วันที่ฟักออกจากไข่</th>
                        <th>วันที่รับไก่เข้ามา</th>
                        <th>ประเภท</th>
                        <th>เพศ</th>
                        <th>โรงเรือน</th>
                        <th>กรงที่</th>
                        <th>ปี/ล็อต</th>
                        <th>สถานะ</th>
                        <th></th>
                      </thead>
                      <tbody>
                        <?php if(empty($allChickenInHouse)){ ?>
                          <?php echo "<h3>ไม่พบข้อมูล</h3>";?>
                        <?php }else{?>
                          <?php foreach($allChickenInHouse as $data){ ?>
                            <tr>
                              <td><?php echo $data["chicken_number"];?></td>
                              <td><?php echo $data["breed_name"];?></td>
                              <td><?php echo formatDateFull($data["date_egg"]);?></td>
                              <td><?php echo formatDateFull($data["date_receive"]);?></td>
                              <td><?php echo $type_map[$data["chicken_type"]];?></td>
                              <td><?php echo $sex_map[$data["chicken_sex"]];?></td>
                              <td><?php echo $data["house_name"];?></td>
                              <td><?php echo $data["coop_id"];?></td>
                              <td><?php echo $data["year_import"];?>/<?php echo $data["number_import"];?></td>
                              <td><?php echo $status_map[$data["status"]];?></td>
                              <td style="width:5%;">
                                <a href="edit_chicken_info.php?id=<?php echo $data["id"];?>" class="btn btn-info">บันทึกรายละเอียด</a>
                              </td>
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
            if (td) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
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
