<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("location: login.php");
    }
    include("header.php");
?>

<body style="align-items: center; "  class="dashboard">

    <div class="row animate__animated animate__zoomIn">
        <!-- <div class="col-md-2"></div> -->
        <div class="reports">
            <a href="dailyterminalreports.php">
            <div class="row">
                <p>Daily Terminal Count Reports</p>
            </div>
            </a>

            <br>

            <a href="">
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

            <a href="">
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
        <!-- <div class="col-md-2"></div> -->

    </div>
</body>
</html>