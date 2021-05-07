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
                                    <div class="table-responsive">

                                        <?php if ($_SESSION["status"] == 1) { ?>
                                            <a href="edit_house.php" class="btn btn-success"><i class="ti-plus"></i> เพิ่ม</a>
                                        <?php } ?>

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
                                                            <td style="width:5%;">
                                                                <a href="edit_house_info.php?id=<?php echo $data["id"]; ?>" class="btn btn-info">รายละเอียด</a>
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