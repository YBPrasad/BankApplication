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

    if(!empty($vender) && !empty($model) && !empty($type) && !empty($serialno) && !empty($mcc) && 
    !empty($merchantno) && !empty($nfc) && !empty($lname) && !empty($cname) && !empty($address) && !empty($city) && !empty($district)){

            $sql2 = mysqli_query($conn, "update terminal set vender='{$vender}',model='{$model}',type='{$type}',
            sno='{$serialno}',mcc='{$mcc}',merchantno='{$merchantno}',nfc='{$nfc}',lname='{$lname}',
            cname='{$cname}',address='{$address}',city='{$city}',district='{$district}',cup='{$cup}' where terminal_id='{$terminalid}'");

            if($sql2){
                echo "success";
            }
            else{
                echo "Something went wrong";
            }


    }

    else{
        
            echo "All inputs fields are required";
    }

?>