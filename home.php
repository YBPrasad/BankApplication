<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
}

include("header.php");
?>

<body>
    <div class="container-fluid home">
        <br>
        <div class="row">

            <div class="col-md-10">
                <p><i class="fas fa-user" style="margin-right:5px"></i><?php echo $_SESSION['username'] ?></p>
            </div>

            <div class="col-md-2">
                <a href="dashboard.php">Main Menu</a>
                <a href="logout.php" style="color:red;margin-left:5px">Logout</a>
            </div>
        </div>
        <h1 class="heading" style="text-align:center;padding:10px 0"> Bank <span style="color:blue">DASHBOARD</span> </h1>
        <br>
        <div class="row">
            <div class="col-md-3" style="text-align:center;">
                <div class="card c1">
                    <p>Yesterday Created Terminal</p>
                    <div class="no">
                        <?php
                        include("php/config.php");
                        $yesterday = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") - 1, date("Y")));
                        $sql = mysqli_query($conn, "select * from terminal where date='{$yesterday}';");
                        ?>
                        <p style="font-size:50px"><?php echo mysqli_num_rows($sql) ?></p>
                        <?php
                        ?>
                    </div>
                </div>

                <!-- <div class="card">
                    card02
                </div> -->
            </div>

            <div class="col-md-3" style="text-align:center;">
                <div class="card c2">
                    <p>Today Created Terminal</p>
                    <div class="no">
                        <?php
                        include("php/config.php");
                        $today = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d"), date("Y")));
                        $sql = mysqli_query($conn, "select * from terminal where date='{$today}';");
                        ?>
                        <p style="font-size:50px"><?php echo mysqli_num_rows($sql) ?></p>
                        <?php
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-md-3" style="text-align:center;">
                <div class="card c3">

                    <div class="no">
                    </div>
                </div>
            </div>
            <div class="col-md-3" style="text-align:center;">
                <div class="card c4">

                    <div class="no">
                    </div>
                </div>
            </div>



        </div>
        <br>
        <div class="row bottom-img">
            <div class="col-md-2"></div>
            <div class="col-md-8">

            </div>
            <div class="col-md-2"></div>

        </div>
    </div>

</body>

</html>