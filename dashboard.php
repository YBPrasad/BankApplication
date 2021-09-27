<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: login.php");
}
include("header.php");
?>

<body style="align-items: center; ">
    <!-- review section starts  -->

    <div class="container">
        <div class="row" style="margin-top:-50px">

            <div class="col-md-10">
                <p><i class="fas fa-user" style="margin-right:5px"></i><?php echo $_SESSION['username'] ?></p>
            </div>

            <div class="col-md-2">
                <a href="home.php">Home</a>
                <a href="logout.php" style="color:red;margin-left:5px">Logout</a>
            </div>
        </div>
        <div class="row">

            <section class="review" id="review">

                <h1 class="heading" style="text-align:center;margin-top:50px"> POS Terminal <span style="color:blue">Inventory</span> </h1>

                <div class="box-container">

                    <a href="createterminal.php" class="box b1">
                        <p>Create Terminal ID</p>
                    </a>
                    <a href="viewterminal.php" class="box b2">
                        <p>View Terminal ID</p>
                    </a><a href="editterminal.php" class="box b3">
                        <p>Edit Terminal ID</p>
                    </a><a href="deleteterminal.php" class="box b4">
                        <p>Delete Terminal ID</p>
                    </a><a href="viewreports.php" class="box b5">
                        <p>View Reports</p>
                    </a>



                </div>

            </section>
        </div>
    </div>



    <!-- review section ends -->


</body>

</html>