<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php
$allFood = getAllFood();
if (isset($_GET['delete'])) {
  deleteFood($_GET['delete']);
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
                  <h4 class="card-title ">แสดง / ลบข้อมูลอาหารไก่</h4>
                  <p class="card-category">อาหารไก่ทั้งหมด</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <a href="edit_food.php" class="btn btn-success" ><i class="ti-plus"></i> เพิ่ม</a>
                    <table class="table">
                      <thead class=" text-primary">
                        <th>ชื่อ/สูตรอาหาร</th>
                        <th>ประเภทอาหาร</th>
                        <th>รายละเอียด</th>
                        <th>วันที่</th>
                        <th></th>
                        <th></th>
                      </thead>
                      <tbody>
                        <?php if(empty($allFood)){ ?>
                          <?php echo "<h3>ไม่พบข้อมูล</h3>";?>
                        <?php }else{?>
                          <?php foreach($allFood as $data){ ?>   
                            <tr>
                              <td><?php echo $data["food_name"];?></td>
                              <td><?php echo $data["food_type"];?></td>
                              <td><?php echo $data["food_desc"];?></td>
                              <td><?php echo formatDateFull($data["update_date"]);?></td>
                              <td style="width:5%;">
                                <a href="edit_food.php?id=<?php echo $data["id"];?>" class="btn btn-warning">แก้ไข</a>
                              </td>
                              <!-- <td style="width:5%;">
                                <a href="?delete=<?php echo $data['id'];?>" class="btn btn-danger" onClick="javascript: return confirm('ยืนยันการลบ');">ลบ</a>
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
