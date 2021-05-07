<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
?>
<?php
$allUser = getAllUser();
if (isset($_GET['delete'])) {
  deleteUser($_GET['delete']);
}
$status_map = array( 1=>'<a style="color:red">ผู้ดูแลระบบ</a>',2=>'<a style="color:green">พนักงาน</a>');
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
                  <h4 class="card-title ">แสดง / ลบข้อมูลผู้ใช้งาน</h4>
                  <p class="card-category">ผู้ใช้งานทั้งหมด</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <a href="edit_user.php" class="btn btn-success" ><i class="ti-plus"></i> เพิ่ม</a>
                    <table class="table">
                      <thead class=" text-primary">
                        <th>ชื่อผู้ใช้งาน</th>
                        <th>ชื่อ-นามสกุล</th>
                        <th>เบอร์โทรศัพท์</th>
                        <th>อีเมล</th>
                        <th>ที่อยู่</th>
                        <th>สถานะ</th>
                        <th></th>
                        <th></th>
                      </thead>
                      <tbody>
                        <?php if(empty($allUser)){ ?>
                          <?php echo "<h3>ไม่พบข้อมูล</h3>";?>
                        <?php }else{?>
                          <?php foreach($allUser as $data){ ?>   
                            <tr>
                              <td><?php echo $data["username"];?></td>
                              <td><?php echo $data["firstname"];?> <?php echo $data["lastname"];?></td>
                              <td><?php echo $data["telephone"];?></td>
                              <td><?php echo $data["email"];?></td>
                              <td><?php echo $data["address"];?></td>
                              <td><?php echo $status_map[$data["status"]];?></td>
                              <td style="width:5%;">
                                <a href="edit_user.php?id=<?php echo $data["id"];?>" class="btn btn-warning">แก้ไข</a>
                              </td>
                              <td style="width:5%;">
                                <a href="?delete=<?php echo $data['id'];?>" class="btn btn-danger" onClick="javascript: return confirm('ยืนยันการลบ');">ลบ</a>
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

      <?php
      require_once("footer.php");
      ?>

    </div>
  </div>


</body>

</html>
