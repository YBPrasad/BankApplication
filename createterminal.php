<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: login.php");
}
include("header.php");
?>

<body style="background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%);align-items: center; ">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-10">
                <p><i class="fas fa-user" style="margin-right:5px"></i><?php echo $_SESSION['username'] ?></p>
            </div>

            <div class="col-md-2">
                <a href="dashboard.php">Back</a>
                <a href="logout.php" style="color:red;margin-left:5px">Logout</a>
            </div>
        </div>
        <div class="row">
            <h1 class="heading animate__animated animate__slideInDown" style="text-align:center"> Terminal Creation<span style="color:blue"> Form</span> </h1>
        </div>

        <?php
        include("createform.php");
        ?>

    </div>
    <script src="js/createterminal.js"></script>
    <script>
        function update() {
            var x = document.getElementById("vender").value;
            var epic1 = document.getElementById("epic1");
            var epic2 = document.getElementById("epic2");
            var epic3 = document.getElementById("epic3");

            var sits = document.getElementById("csits");
            if (x == "epic")
                sits.style.display = 'none';

            else if (x == "sits") {
                sits.style.display = 'block';
                epic1.style.display = 'none';
                epic2.style.display = 'none';
                epic3.style.display = 'none';
            } else {
                sits.style.display = 'block';
                epic1.style.display = 'block';
                epic2.style.display = 'block';
                epic3.style.display = 'block';
            }

        }
    </script>



</body>

</html>