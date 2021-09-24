<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header("location: login.php");
    }
    include("header.php");
?>

<body class="daily" style="background-color: #8EC5FC;background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);">
    <div class="container-fluid">
    <div class="row" style="margin-top:50px">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <a href="dashboard.php">Home</a>
                <a href="logout.php" style="color:red;margin-left:5px">Logout</a>
            </div>
        </div>
    <div class="row">
            <h1 class="heading" style="text-align:center"> Daily Terminal Count <span style="color:blue"> Reports</span> </h1>
        </div>
        <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-4">
                    <label for="">From</label>
                    <input type="date" name="fromDate" id="fromDate" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="">To</label>
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

            if(isset($_POST['submit'])){
                $fromDate=$_POST['fromDate'];
                $toDate=$_POST['toDate'];
            
                $sql=mysqli_query($conn,"select * from terminal where date between '{$fromDate}' and '{$toDate}'");

                if(mysqli_num_rows($sql)<1){
                    $error="Nothing data";
                    ?>
                        <div class="errorTxt" style="text-align:center"><?php echo $error;?></div>
                    <?php
                     
                }
                else{
                    ?>
                    
                    <table class="table table-striped" style="margin-top:20px" id="table-id">
                                <thead  style="color:blue">
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
                                <tbody>
                                
                    <?php
                    while($row=mysqli_fetch_assoc($sql)){
                        ?>
                           
                                    <tr>
                                        <td><?php echo $row['terminal_id']?></td>
                                        <td><?php echo $row['vender']?></td>
                                        <td><?php echo $row['model']?></td>
                                        <td><?php echo $row['type']?></td>
                                        <td><?php echo $row['sno']?></td>
                                        <td><?php echo $row['mcc']?></td>
                                        <td><?php echo $row['merchantno']?></td>
                                        <td><?php echo $row['nfc']?></td>
                                        <td><?php echo $row['lname']?></td>
                                        <td><?php echo $row['cname']?></td>
                                        <td><?php echo $row['address']?></td>
                                        <td><?php echo $row['city']?></td>
                                        <td><?php echo $row['district']?></td>



                                    </tr>
                            <?php
                    }
                    ?>
                                </tbody>
                            </table>

                            <div class="row total">
                                <div class="col-md-3">
                                    <div class="total-val">
                                        Total <?php echo mysqli_num_rows($sql)?>
                                        
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

    <script>
        function ExportToExcel(type, fn, dl) {
       var elt = document.getElementById('table-id');
       var wb = XLSX.utils.table_to_book(elt, { sheet: "sheet1" });
       const d = new Date();
       return dl ?
         XLSX.write(wb, { bookType: type, bookSST: true, type: 'base64' }):
         XLSX.writeFile(wb, fn || (d+'.' + (type || 'xlsx')));
    }

    
    </script>
    
    
</body>
</html>