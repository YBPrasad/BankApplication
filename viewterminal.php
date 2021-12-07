<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("location: login.php");
    }
    include("header.php");
?>

<body class="dashboard">

    <div class="container-fluid view">
    <div class="row" style="margin-top:5px">
        <div class="col-md-10">
                <p><i class="fas fa-user" style="margin-right:5px"></i><?php echo $_SESSION['username']?></p>
            </div>
            <div class="col-md-2">
                <a href="dashboard.php">Back</a>
                <a href="logout.php" style="color:red;margin-left:5px">Logout</a>
            </div>
        </div>
        <div class="row">
  
            <h1 class="heading" style="text-align:center;text-shadow: 0 0 3px #FF0, 0 0 5px #0000FF;"> Search Terminal<span style="color:whitesmoke"> ID</span> </h1>
        </div>
        <br><br>
        <div class="row" style="margin-top:-50px">
            <!-- <div class="col-md-2"></div> -->
            <div class="col-md-3">
            <form action="" method="GET" enctype="multipart/form-data" autocomplete="off">
                <p id="error-text" style="color:red"></p>
            
                <div class="field input"  style="text-align:center">
                    <label>Terminal ID</label>
                        <input type="text" class="form-control" name="searchTxt" placeholder="Enter terminal id here" required>
              
                </div>
                <div class="field button" style="text-align:center;margin-top:10px">
                    <input type="submit" class="btn btn-outline-success" name="submit" value="Search">
                </div>
            </form>
            </div>

            <div class="col-md-9" >
                <?php
                    include("php/config.php");

                    if(isset($_GET['searchTxt'])){
                        $search=$_GET['searchTxt'];
                        
                        $sql=mysqli_query($conn,"select * from terminal where terminal_id = '{$search}' and status=0");

                        if(mysqli_num_rows($sql)<1){
                            $error="Error terminal id";
                            $_POST['error']="Error terminal id";
                            ?>
                                <div class="errorTxt" style="text-align:center"><?php echo $error;?></div>
                            <?php
                             
                        }
                        else{
                            while($row=mysqli_fetch_assoc($sql)){
                                ?>

                                <div class="row" style="margin-top:25px;background-color: hsla(120, 60%, 70%, 0.3);">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-5" style="font-weight:bold;">Terminal ID</div>
                                            <div class="col-md-7"><?php echo $row['terminal_id']?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5" style="font-weight:bold;">Vender</div>
                                            <div class="col-md-7"><?php echo $row['vender']?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5" style="font-weight:bold;">Model</div>
                                            <div class="col-md-7"><?php echo $row['model']?></div>
                                        </div>

                                    <div class="row">
                                        <div class="col-md-5" style="font-weight:bold;">Type</div>
                                        <div class="col-md-7"><?php echo $row['type']?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5" style="font-weight:bold;">Serial No</div>
                                        <div class="col-md-7"><?php echo $row['sno']?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5" style="font-weight:bold;">MCC</div>
                                        <div class="col-md-7"><?php echo $row['mcc']?></div>
                                    </div>
                                    <div class="row">
                                                <div class="col-md-5" style="font-weight:bold;">Merchant No</div>
                                                <div class="col-md-7"><?php echo $row['merchantno']?></div>
                                                </div>

                                           
                                        </div>

                                        <div class="col-md-6">
                                        <div class="row">
                                                <div class="col-md-5" style="font-weight:bold;">NFC Available</div>
                                                <div class="col-md-7"><?php echo $row['nfc']?></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-5" style="font-weight:bold;">Legal Name</div>
                                                <div class="col-md-7"><?php echo $row['lname']?></div>
                                            </div>

                                            <div class="row">
                                                
                                                <div class="col-md-5" style="font-weight:bold;">Com: Name</div>
                                                <div class="col-md-7"><?php echo $row['cname']?></div>
                                            </div>

                                    <div class="row">
                                        <div class="col-md-5" style="font-weight:bold;">Address</div>
                                        <div class="col-md-7"><?php echo $row['address']?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5" style="font-weight:bold;">City</div>
                                        <div class="col-md-7"><?php echo $row['city']?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5" style="font-weight:bold;">District</div>
                                        <div class="col-md-7"><?php echo $row['district']?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5" style="font-weight:bold;">Date</div>
                                        <div class="col-md-7"><?php echo $row['date']?></div>
                                    </div>
                                        </div>
                                    </div>             
                                    
                                <?php
                            }
                        }

                    }
                    
                    
                ?>

            </div>
            
        </div>
    </div>
</body>
</html>