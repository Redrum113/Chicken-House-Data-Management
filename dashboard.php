<!DOCTYPE html>
<html lang="en">
<?php
require_once("header.php");
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
                        <?php if ($_SESSION["status"] == 1) { ?>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card">
                                    <a href="sub_menu_chickenANDhouse.php" style="text-align:center;">
                                        <img src="image/logo2.png" height="150px" width="200px">
                                        <hr />
                                        <div class="stats">
                                            <p style="text-align:center;"><a href="sub_menu_chickenANDhouse.php" class="btn btn-warning">ข้อมูลไก่ในโรงเรือน</a></p>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6">
                                <div class="card">
                                    <a href="manage_house.php" style="text-align:center;">
                                        <img src="image/house2.png" height="150px" width="200px">
                                        <hr />
                                        <div class="stats">
                                            <p style="text-align:center;"><a href="manage_house.php" class="btn btn-warning">ข้อมูลโรงเรือน</a></p>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6">
                                <div class="card">
                                    <a href="search_egg.php" style="text-align:center;">
                                        <img src="image/egg1.png" height="150px" width="200px">
                                        <hr />
                                        <div class="stats">
                                            <p style="text-align:center;"><a href="search_egg.php" class="btn btn-warning">ข้อมูลบันทึกการออกไข่</a></p>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        <?php } ?>




                        <?php if ($_SESSION["status"] == 2) { ?>
                            <div class="col-lg-3 col-sm-6">
                                <div class="card">
                                    <a href="sub_menu_chickenANDhouse.php" style="text-align:center;">
                                        <img src="image/logo2.png" height="150px" width="200px">
                                        <hr />
                                        <div class="stats">
                                            <p style="text-align:center;"><a href="sub_menu_chickenANDhouse.php" class="btn btn-warning">ข้อมูลไก่ในโรงเรือน</a></p>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6">
                                <div class="card">
                                    <a href="manage_house.php" style="text-align:center;">
                                        <img src="image/house2.png" height="150px" width="200px">
                                        <hr />
                                        <div class="stats">
                                            <p style="text-align:center;"><a href="manage_house.php" class="btn btn-warning">ข้อมูลโรงเรือน</a></p>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-sm-6">
                                <div class="card">
                                    <a href="select_house.php" style="text-align:center;">
                                        <img src="image/egg1.png" height="150px" width="200px">
                                        <hr />
                                        <div class="stats">
                                            <p style="text-align:center;"><a href="select_house.php" class="btn btn-warning">บันทึกการออกไข่</a></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        <?php } ?>


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