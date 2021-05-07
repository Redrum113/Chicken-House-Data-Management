<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php
$allDataKeepEgg = getAllDataKeepEgg($_POST["search_date"]);
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
                  <h4 class="card-title ">แสดง / ลบข้อมูลการเก็บไข่ไก่</h4>
                  <p class="card-category">การเก็บไข่ไก่ทั้งหมด</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">

                    <table style="width:100%">
                      <tr>
                        <td style="width:50%;">
                        </td>
                        <td style="width:20%;">
                          <label class="bmd-label-floating">กรงที่ : </label>
                          <input type="text" name="search" id="search" class="form-control border-input" onKeyup="filterSearchProductName();" placeholder="ค้นหาข้อมูล">
                        </td>
                        <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                        <td style="width:20%;">
                          <label class="bmd-label-floating">โรงเรือน : </label>
                          <select name="houses_id" class="form-control border-input" id="houses_id" onchange="filterSearchHouse();">
                            <option value="">-- โปรดระบุ --</option>
                            <?php foreach ($allHouse as $data) { ?>
                              <option value="<?php echo $data['house_name'] ?>"><?php echo $data['house_name'] ?></option>
                            <?php } ?>
                          </select>
                        </td>
                      </tr>
                      <br>
                    </table>
                    <br><br>
                    <table class="table" id="data_table">
                      <thead class=" text-primary">
                        <th>โรงเรือน</th>
                        <th>กรง</th>
                        <th>รหัสไก่</th>
                        <th>จำนวนที่เก็บได้</th>
                        <th>เก็บโดย</th>
                        <th>วันที่เก็บไข่</th>
                        <th>วันที่แก้ไขล่าสุด</th>
                        <th>แก้ไขโดย</th>
                        <th></th>
                      </thead>
                      <tbody>
                        <?php if (empty($allDataKeepEgg)) { ?>
                          <?php echo "<h3>ไม่พบข้อมูล</h3>"; ?>
                        <?php } else { ?>
                          <?php foreach ($allDataKeepEgg as $data) { ?>
                            <?php
                              $currentUserKeep = getCurrentUser($data["users_keep_id"]);
                              $currentUserEdit = getCurrentUser($data["users_edit_id"]);

                            ?>
                            <tr>
                              <td><?php echo $data["house_name"]; ?></td>
                              <td><?php echo $data["coop_id"]; ?></td>
                              <td><?php echo $data["chicken_number"]; ?></td>
                              <td><?php echo $data["amount_egg"]; ?></td>
                              <td><?php echo $currentUserKeep["firstname"]; ?> <?php echo $currentUserKeep["lastname"]; ?></td>
                              <td><?php echo formatDateFull($data["date_keep"]); ?></td>
                              <td><?php echo formatDateFull($data["update_date"]); ?></td>
                              <td><?php echo $currentUserEdit["firstname"]; ?> <?php echo $currentUserEdit["lastname"]; ?></td>
                              <td style="width:5%;">
                                <a href="edit_egg.php?id=<?php echo $data["id"]; ?>" class="btn btn-warning">แก้ไข</a>
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
            td1 = tr[i].getElementsByTagName("td")[1];
            td2 = tr[i].getElementsByTagName("td")[2];
            td3 = tr[i].getElementsByTagName("td")[3];
            if (td || td1 || td2 || td3) {
              if (td.innerHTML.toUpperCase().indexOf(filter) > -1 || td1.innerHTML.toUpperCase().indexOf(filter) > -1 || td2.innerHTML.toUpperCase().indexOf(filter) > -1 || td3.innerHTML.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }
          }
        }
      </script>
      <script>
        function filterSearchHouse() {
          var input, filter, table, tr, td, i;
          input = document.getElementById("houses_id");
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