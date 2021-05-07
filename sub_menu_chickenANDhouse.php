<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
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
                                    <h4 class="card-title ">ข้อมูลไก่ในโรงเรือน</h4>
                                    <p class="card-category">Chicken Data Management</p>
                                </div>
                                <br>
                                <div align="center">
                                    <tr>
                                        <td>
                                            <span style="text-align:center;"><a href="manage_chicken.php" class="btn btn-deleted">ข้อมูลไก่ทั้งหมด</a></span>
                                        </td>
                                        <td>
                                            &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        </td>
                                        <td>
                                            <span style="text-align:center;"><a href="manage_parent.php" class="btn btn-deleted">ข้อมูลพ่อและแม่พันธุ์ไก่</a></span>
                                        </td>
                                    </tr>

                                </div>

                                <hr />

                                <div class="container-fluid">
                                    <div class="row">
                                        <?php if (empty($allHouse)) { ?>
                                            <?php echo "<h3>ไม่พบข้อมูล</h3>"; ?>
                                        <?php } else { ?>
                                            <?php foreach ($allHouse as $data) { ?>
                                                <div class="col-lg-3 col-sm-4">
                                                    <div class="card">
                                                        <a href="chicken_in_house.php?houses_id=<?php echo $data["id"]; ?>" style="text-align:center;">
                                                            <img src="image/house.png" height="150px" width="150px">
                                                            <hr />
                                                            <div class="stats">
                                                                <p style="text-align:center;"><a href="chicken_in_house.php?houses_id=<?php echo $data["id"]; ?>" class="btn btn-warning"><?php echo $data["house_name"]; ?></a></p>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        <?php } ?>


                                    </div>
                                </div>



                                </a>
                            </div>
                        </div>



                        <!-- <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <a href="manage_user.php" style="text-align:center;">
                                    <img src="image/data_ico.png">
                                    <hr />
                                    <div class="stats">
                                        <p style="text-align:center;"><a href="chicken_house.php" class="btn btn-warning">ข้อมูลกรงไก่ในแต่ละโรงเรือน</a></p>
                                    </div>
                                </a>
                            </div>
                        </div> -->
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