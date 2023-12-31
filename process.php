<?php
include 'conn.php';


//add user
if (isset($_POST['register'])) {
    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $email = $_POST['email'];
    $pass1 = $_POST['password1'];
    $pass2 = $_POST['password2'];

    if ($pass1 == $pass2) {
        $hash = password_hash($pass1, PASSWORD_DEFAULT);

        $insert_user = $conn->prepare("INSERT INTO `user`(`user_fname`, `user_Iname`, `user_email`, `user_pass`) VALUES (?, ?, ?, ?)");
        $insert_user->execute([
            $fname,
            $lname,
            $email,
            $hash
        ]);
    
        $msg = "User Created!";
        header("Location: login.php?msg=$msg");
    }else{
        $msg = "Password do not match";
        header("Location: register.php?msg=$msg");
    }
}

// logout
if(isset($_GET['logout'])){
    session_start();
    unset($_SESSION['logged_in']);
    unset($_SESSION['u_id']);

    header("location: login.php");
}