<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: login.php");
}
include("header.php");
?>

<body class="dashboard">
    <div class="container-fluid">
        <div class="row" style="margin-top:5px">
            <div class="col-md-10">
                <p><i class="fas fa-user" style="margin-right:5px"></i><?php echo $_SESSION['username'] ?></p>
            </div>
            <div class="col-md-2">
                <a href="dashboard.php">Back</a>
                <a href="logout.php" style="color:red;margin-left:5px">Logout</a>
            </div>
        </div>
        <div class="row">
            <h1 class="heading" style="text-align:center"> Edit <span style="color:blue"> Terminal</span> </h1>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <form action="" method="GET" enctype="multipart/form-data" autocomplete="off">

                    <div class="field input" style="text-align:center">
                        <label>Terminal ID</label>
                        <input type="text" class="form-control" name="searchTxt" placeholder="Enter terminal id here" required>

                    </div>
                    <div class="field button" style="text-align:center;margin-top:10px">
                        <input type="submit" class="btn btn-outline-success" name="submit" value="Search">
                    </div>
                </form>
            </div>
            <div class="col-md-4"></div>


        </div>

        <br>

        <!-- start form -->
        <div class="row">
            <?php
            include("php/config.php");

            if (isset($_GET['searchTxt'])) {
                $search = $_GET['searchTxt'];

                $sql = mysqli_query($conn, "select * from terminal where terminal_id = '{$search}'");

                if (mysqli_num_rows($sql) < 1) {
            ?>
                    <div class="errorTxt" style="text-align:center;color:red"><?php echo "Terminal id incorrect"; ?></div>
                    <?php

                } else {
                    while ($row = mysqli_fetch_assoc($sql)) {
                    ?>
                        <div class="col-md-1"></div>
                        <div class="col-md-10 create" style="border:1px solid red">
                            <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off" style="padding:5px">
                                <div class="error-text" style="color:red;text-align:center"></div>
                                <div class="row" style="margin:2px 0">
                                    <div class="col-md-4">
                                        <label>Terminal ID</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" value="<?php echo $row['terminal_id']; ?>" class="form-control" name="terminalid">
                                    </div>
                                </div>

                                <div class="row" style="margin:2px 0">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="">Vender</label>
                                            </div>
                                            <div class="col-md-8">
                                                <select name="vender" id="vender" onchange="update()">
                                                    <option value=""><?php echo $row['vender']; ?></option>
                                                    <option value="epic">EPIC Lanka</option>
                                                    <option value="sits">SITS</option>
                                                    <option value="cba">CBA</option>
                                                    <option value="dms">DMS</option>
                                                    <option value="inter">Interblocks</option>
                                                    <option value="other">Other</option>

                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="">Model</label>
                                            </div>
                                            <div class="col-md-8">
                                                <select name="model" id="model">
                                                    <option value=""></option>
                                                    <option value="vx510" id="epic1">VX 510</option>
                                                    <option value="vx520" id="epic2">VX 520</option>
                                                    <option value="vx520c" id="epic3">VX 520C</option>
                                                    <option value="t1000" id="csits">T1000</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <label for="">Type</label>
                                            </div>
                                            <div class="col-md-8">
                                                <select name="type" id="type">
                                                    <option value=""></option>
                                                    <option value="gprs">GPRS</option>
                                                    <option value="pstn">PSTN</option>
                                                    <option value="ip">IP</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row" style="margin:2px 0">
                                    <div class="col-md-4">
                                        <label>Serial Number</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" value="<?php echo $row['sno']; ?>" class="form-control" name="serialno" placeholder="Enter Serial no here" required>
                                    </div>
                                </div>

                                <div class="row" style="margin:2px 0">
                                    <div class="col-md-4">
                                        <label>MCC</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="number" value="<?php echo $row['mcc']; ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxLength="4" class="form-control" name="mcc" placeholder="Enter MCC here" required>
                                    </div>
                                </div>

                                <div class="row" style="margin:2px 0">
                                    <div class="col-md-4">
                                        <label>Merchant Number</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="number" value="<?php echo $row['merchantno']; ?>" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxLength="7" class="form-control" name="merchantno" placeholder="Enter Merchant no here" required>
                                    </div>
                                </div>

                                <div class="row" style="margin:2px 0">
                                    <div class="col-md-4">
                                        <label>NFC Availability</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="nfc" id="nfc" value="<?php echo $row['nfc']; ?>">
                                            <option value=""></option>
                                            <option value="yes">Yes</option>
                                            <option value="no">No</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row" style="margin:2px 0">
                                    <div class="col-md-4">
                                        <label>Legal Name</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" name="lname" value="<?php echo $row['lname']; ?>" class="form-control" placeholder="Enter legal name here" required>
                                    </div>
                                </div>

                                <div class="row" style="margin:2px 0">
                                    <div class="col-md-4">
                                        <label>Commercial Name</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" value="<?php echo $row['cname']; ?>" name="cname" class="form-control" placeholder="Enter Commercial Name here" required>
                                    </div>
                                </div>

                                <div class="row" style="margin:2px 0">
                                    <div class="col-md-4">
                                        <label>Address</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" value="<?php echo $row['address']; ?>" name="address" class="form-control" placeholder="Enter Address here" required>
                                    </div>
                                </div>

                                <div class="row" style="margin:2px 0">
                                    <div class="col-md-4">
                                        <label>City</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" value="<?php echo $row['city']; ?>" name="city" class="form-control" placeholder="Enter City here" required>
                                    </div>
                                </div>

                                <div class="row" style="margin:2px 0">
                                    <div class="col-md-4">
                                        <label>District</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="district" id="district">
                                            <option value=""></option>
                                            <option value="ampara">Ampara</option>
                                            <option value="anuradhapura">Anuradhapura</option>
                                        </select>
                                    </div>
                                </div>


                                <div class="row" style="text-align:center;margin:2px 0">
                                    <div class="field button">
                                        <input type="submit" class="btn btn-warning" name="submit" value="Update Terminal">
                                    </div>
                                </div>

                            </form>
                <?php
                    }
                }
            }


                ?>


                        </div>
                        <div class="col-md-1"></div>


        </div>
    </div>
    </div>

    <script src="js/updateterminal.js"></script>
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