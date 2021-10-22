<?php
    session_start();
    include("config.php");

    $terminalid = mysqli_real_escape_string($conn, $_POST['terminalid']);
    $vender = mysqli_real_escape_string($conn, $_POST['vender']);
    $model = mysqli_real_escape_string($conn, $_POST['model']);
    $type = mysqli_real_escape_string($conn, $_POST['type']);
    $serialno = mysqli_real_escape_string($conn, $_POST['serialno']);
    $mcc= mysqli_real_escape_string($conn, $_POST['mcc']);
    $merchantno= mysqli_real_escape_string($conn, $_POST['merchantno']);
    $nfc = mysqli_real_escape_string($conn, $_POST['nfc']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $cname = mysqli_real_escape_string($conn, $_POST['cname']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $city = mysqli_real_escape_string($conn, $_POST['city']);
    $district = mysqli_real_escape_string($conn, $_POST['district']);
    $cup=mysqli_real_escape_string($conn, $_POST['cup']);


    if(!empty($terminalid) && !empty($vender) && !empty($model) && !empty($type) && !empty($serialno) && !empty($mcc) && 
    !empty($merchantno) && !empty($nfc) && !empty($lname) && !empty($cname) && !empty($address) && !empty($city) && !empty($district) && !empty($cup)){

        $sql1 = mysqli_query($conn, "SELECT * FROM terminal WHERE terminal_id = '{$terminalid}'");
        if(mysqli_num_rows($sql1)>0){
            echo "Terminal id already exists";
        }
        else{
            $currentDate=date('Y-m-d');
            $sql2 = mysqli_query($conn, "INSERT INTO terminal (terminal_id,vender,model,type,sno,mcc,merchantno,nfc,lname,cname,address,city,district,date,status,cup)
            VALUES ('{$terminalid}', '{$vender}','{$model}','{$type}','{$serialno}','{$mcc}','{$merchantno}',
            '{$nfc}','{$lname}','{$cname}','{$address}','{$city}','{$district}','{$currentDate}',0,'{$cup}')");

            if($sql2){
                echo "success";
            }
            else{
                echo "Something went wrong";
            }


        }
    }

    else{
        
            echo "All inputs fields are required";
    }
