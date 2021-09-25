<?php
    session_start();
    include("config.php");
    include("../header.php");

    if(!isset($_SESSION['username'])){
        header("location:login.php");
    }

    $data1 = $_GET['tid'];
    // echo $data1;

    $sql="delete from terminal where terminal_id='{$data1}' ";

    if(mysqli_query($conn,$sql)){
        header("location:../deleteterminal.php") ;   
    }


?>


