<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("location: login.php");
    }
    include("header.php");
?>

<body  class="dashboard">
<div class="container-fluid">
<div class="row" style="margin-top: 10px;" >

<div class="col-md-10">
    <p style="color:blanchedalmond"><i class="fas fa-user" style="margin-right:5px;"></i><?php echo $_SESSION['username'] ?></p>
</div>

<div class="col-md-2">
    <a href="dashboard.php">Main Menu</a>
    <a href="logout.php" style="color:red;margin-left:5px">Logout</a>
</div>
</div>
<div style="margin-top: 30px;" class="row animate__animated animate__zoomIn">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        <div class="reports">
            <a href="dailyterminalreports.php">
            <div class="row">
                <p>Daily Terminal Count Reports</p>
            </div>
            </a>

            <br>

            <a href="deleteterminalreports.php">
            <div class="row">
                <p>Terminal Delete Reports</p>
            </div>
            </a>

            <br>

            <a href="contactlessreport.php">
            <div class="row">
                <p>Contactless Reports</p>
            </div>
            </a>

            <br>

            <a href="cupreports.php">
            <div class="row">
                <p>Cup Reports</p>
            </div>
            </a>
            <br>

            <a href="">
            <div class="row">
                <p>Amex Sharing Reports</p>
            </div>
            </a>
            
        </div>
        </div>
        <div class="col-md-4"></div>

        
       

    </div>
</div>

    
</body>
</html>