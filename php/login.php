<?php
    session_start();
    include("config.php");
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($username) && !empty($password)){
        $sql = mysqli_query($conn, "SELECT * FROM admin WHERE username = '{$username}'");
        if(mysqli_num_rows($sql) > 0){
            $row = mysqli_fetch_assoc($sql);
            // $user_pass = md5($password);
            // $enc_pass = $row['password'];
            if($row['password'] === $password){
                
                $_SESSION['username'] = $row['username'];
                echo "success";
            }else{
                echo "Email or Password is Incorrect!";
            }
        }else{
            echo "$username - This username not Exist!";
        }
    }else{
        echo "All input fields are required!";
    }
?>