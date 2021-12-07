<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location: login.php");
}
include("header.php");
?>

<body class="daily dashboard">
    <div class="container-fluid">
        <div class="row" style="margin-top:50px">
            <div class="col-md-10">
                <p style="color:blanchedalmond"><i class="fas fa-user" style="margin-right:5px;"></i><?php echo $_SESSION['username'] ?></p>
            </div>
            <div class="col-md-2">
                <a href="viewreports.php">Back</a>
                <a href="logout.php" style="color:red;margin-left:5px">Logout</a>
            </div>
        </div>
        <div class="row">
            <h1 class="heading" style="text-align:center;text-shadow: 0 0 3px #FF0, 0 0 5px #0000FF;">  Terminal Delete <span style="color:whitesmoke"> Reports</span> </h1>
        </div>
        <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <label for="" style="color:whitesmoke">From</label>
                    <input type="date" name="fromDate" id="fromDate" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="" style="color:whitesmoke">To</label>
                    <input type="date" name="toDate" id="toDate" class="form-control">
                </div>
                <div class="col-md-2">
                    <input type="submit" class="btn btn-primary" name="submit" value="Search" style="margin-top:23px">
                </div>

            </div>
        </form>

        <div class="row">

            <?php
            include('php/config.php');

            if (isset($_POST['submit'])) {
                $fromDate = $_POST['fromDate'];
                $toDate = $_POST['toDate'];

                $sql = mysqli_query($conn, "select * from terminal where date between '{$fromDate}' and '{$toDate}' and status=1 ");

                if (mysqli_num_rows($sql) < 1) {
                    $error = "Nothing data";
            ?>
                    <div class="errorTxt" style="text-align:center"><?php echo $error; ?></div>
                <?php

                } else {
                ?>

                    <table class="table table-dark" style="margin-top:20px" id="tableData">
                        <thead style="color:blue">
                            <tr>
                                <th>Termi: Id</th>
                                <th>Vender</th>
                                <th>Model</th>
                                <th>Type</th>
                                <th>SerialNo</th>
                                <th>MCC</th>
                                <th>MerchantNo</th>
                                <th>nfcAvailable</th>
                                <th>LegalName</th>
                                <th>CommercialName</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>District</th>
                            </tr>
                        </thead>
                        <tbody style="color:whitesmoke">

                            <?php
                            while ($row = mysqli_fetch_assoc($sql)) {
                            ?>

                                <tr>
                                    <td><?php echo $row['terminal_id'] ?></td>
                                    <td><?php echo $row['vender'] ?></td>
                                    <td><?php echo $row['model'] ?></td>
                                    <td><?php echo $row['type'] ?></td>
                                    <td><?php echo $row['sno'] ?></td>
                                    <td><?php echo $row['mcc'] ?></td>
                                    <td><?php echo $row['merchantno'] ?></td>
                                    <td><?php echo $row['nfc'] ?></td>
                                    <td><?php echo $row['lname'] ?></td>
                                    <td><?php echo $row['cname'] ?></td>
                                    <td><?php echo $row['address'] ?></td>
                                    <td><?php echo $row['city'] ?></td>
                                    <td><?php echo $row['district'] ?></td>



                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>

                    <div class="row total">
                        <div class="col-md-3">
                            <div class="total-val">
                                Total <?php echo mysqli_num_rows($sql) ?>

                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5"></div>
                        <div class="col-md-2">
                            <button class="btn btn-success" onclick="ExportToExcel('xlsx')">Export to Excel</button>
                        </div>
                        <div class="col-md-5"></div>
                    </div>




            <?php

                }
            }
            ?>
        </div>

    </div>
</body>
</html>