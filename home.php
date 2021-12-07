<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("location:login.php");
}

include("header.php");
?>

<body class="dashboard">
    <div class="container-fluid home">
        <br>
        <div class="row">

            <div class="col-md-10">
                <p style="color:whitesmoke"><i class="fas fa-user" style="margin-right:5px;"></i><?php echo $_SESSION['username'] ?></p>
            </div>

            <div class="col-md-2">
                <a href="dashboard.php">Main Menu</a>
                <a href="logout.php" style="color:red;margin-left:5px">Logout</a>
            </div>
        </div>
        <h1 class="heading" style="text-align:center;padding:10px 0;text-shadow: 0 0 3px #FF0, 0 0 5px #0000FF;""> Bank <span style="color:whitesmoke">DASHBOARD</span> </h1>
        <br>

        <ul>
            <li class="" style="text-align:center;">
                <div class="card c1 animate__animated animate__flipInX">
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
</li>

            <li class="" style="text-align:center;">
                <div class="card c2 animate__animated animate__flipInX">
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
</li>
            <li class="" style="text-align:center;">
                <div class="card c3 animate__animated animate__flipInX">
                    <p>Total Cup Terminal</p>
                    <div class="no">
                        <?php
                            include("php/config.php");
                            
                            $sql=mysqli_query($conn,"select * from terminal where cup='yes';");
                        ?>
                        <p style="font-size:50px"><?php echo mysqli_num_rows($sql) ?></p>
                    </div>
                </div>
</li>
            <li class="" style="text-align:center;">
                <div class="card c4 animate__animated  animate__flipInX">
                    <p>Total Contactless Terminal</p>
                    <div class="no">
                    <?php
                            include("php/config.php");
                            
                            $sql=mysqli_query($conn,"select * from terminal where nfc='yes';");
                        ?>
                        <p style="font-size:50px"><?php echo mysqli_num_rows($sql) ?></p>
                    </div>
                </div>
</li>

            <li class="" style="text-align:center;">
                <div class="card c5 animate__animated  animate__flipInX">
                    <p>Dispatched Terminal</p>
                    <div class="no">
                        <?php
                            include("php/config.php");
                            $sql1=mysqli_query($conn,"select * from terminal where vender='epic';");
                            $sql2=mysqli_query($conn,"select * from terminal where vender='sits';");
                            $sql3=mysqli_query($conn,"select * from terminal where vender='cba';");
                            $sql4=mysqli_query($conn,"select * from terminal where vender='inter';");


                        ?>
                        <ul>
                            <li>EPIC Lanka - <?php echo mysqli_num_rows($sql1) ?></li>
                            <li>SITS       - <?php echo mysqli_num_rows($sql2) ?></li>
                            <li>CBA        - <?php echo mysqli_num_rows($sql3) ?></li>
                            <li>Interblocks- <?php echo mysqli_num_rows($sql4) ?></li>
                        </ul>
                    </div>
                </div>
</li>

</ul>
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