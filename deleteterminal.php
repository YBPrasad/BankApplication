<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("location: login.php");
    }
    include("header.php");
?>

<body style="background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%);">

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
            <h1 class="heading" style="text-align:center"> Delete Terminal<span style="color:blue"> ID</span> </h1>
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
                        
                        $sql=mysqli_query($conn,"select * from terminal where terminal_id = '{$search}'");

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

                                <div class="row" style="margin-top:25px">
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="col-md-5" style="font-weight:bold;color:blue">Terminal ID</div>
                                            <div class="col-md-7"><?php echo $row['terminal_id']?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5" style="font-weight:bold;color:blue">Vender</div>
                                            <div class="col-md-7"><?php echo $row['vender']?></div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-5" style="font-weight:bold;color:blue">Model</div>
                                            <div class="col-md-7"><?php echo $row['model']?></div>
                                        </div>

                                    <div class="row">
                                        <div class="col-md-5" style="font-weight:bold;color:blue">Type</div>
                                        <div class="col-md-7"><?php echo $row['type']?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5" style="font-weight:bold;color:blue">Serial No</div>
                                        <div class="col-md-7"><?php echo $row['sno']?></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-5" style="font-weight:bold;color:blue">MCC</div>
                                        <div class="col-md-7"><?php echo $row['mcc']?></div>
                                    </div>
                                    <div class="row">
                                                <div class="col-md-5" style="font-weight:bold;color:blue">Merchant No</div>
                                                <div class="col-md-7"><?php echo $row['merchantno']?></div>
                                                </div>

                                           
                                        </div>

                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-5" style="font-weight:bold;color:blue">NFC Available</div>
                                                <div class="col-md-7"><?php echo $row['nfc']?></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-5" style="font-weight:bold;color:blue">Legal Name</div>
                                                <div class="col-md-7"><?php echo $row['lname']?></div>
                                            </div>

                                            <div class="row">
                                                
                                                <div class="col-md-5" style="font-weight:bold;color:blue">Com: Name</div>
                                                <div class="col-md-7"><?php echo $row['cname']?></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-5" style="font-weight:bold;color:blue">Address</div>
                                                <div class="col-md-7"><?php echo $row['address']?></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-5" style="font-weight:bold;color:blue">City</div>
                                                <div class="col-md-7"><?php echo $row['city']?></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-5" style="font-weight:bold;color:blue">District</div>
                                                <div class="col-md-7"><?php echo $row['district']?></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-5" style="font-weight:bold;color:blue">Date</div>
                                                <div class="col-md-7"><?php echo $row['date']?></div>
                                            </div>
<br>
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <!-- <input type="submit" class="btn btn-outline-danger" onClick="return confirm('Are you sure you want to Delete ?')?<?php echo 'Yes'?>:<?php echo 'No'?>" name="submit" value="Delete"> -->
                                                    <a type="submit" class="btn btn-danger" href="php/delete.php?tid=<?php echo $row['terminal_id']?>" onclick="return confirm('Are you sure you want to delete?')">Delete</a> 
                                                </div>
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

    <script>
    function confirmDelete() {
        
        if (confirm("Are you sure you want to delete")) {
            
            return true;
        }
    }
    </script>
</body>
</html>