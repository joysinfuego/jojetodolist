<?php
include 'conn.php';

// add data
if (isset($_POST['add'])) {
    $userID = $_POST['userID'];
    $list = $_POST['list'];

    // INSERT INTO table_name (column1, column2, column3, ...)VALUES (value1, value2, value3, ...);

    $insertData = $conn->prepare("INSERT INTO personal_info(user_id, list) VALUES(?, ?)");
    $insertData->execute([$userID, $list]);

    $msg = "List Inserted";
    header("Location: index.php?msg=$msg");
} else {

    $msg = "Something went wrong!";
    header("Location: index.php?msg = $msg");
}

// update data
if (isset($_POST['update'])) {
    $userID = $_POST['userID'];
    $list = $_POST['list'];
    

    $updateUser = $conn->prepare("UPDATE personal_info SET list = ?  WHERE p_id = ?");
    $updateUser->execute([
        $list,
        $userID
    ]);

    $msg = "List updated";
    header("Location: index.php?msg=$msg");
}

// delete data
if (isset($_GET['delete'])) {
    $id = $_GET['id'];

    $delete = $conn->prepare("DELETE FROM personal_info WHERE p_id = ?");
    $delete->execute([$id]);

    $msg = "List deleted!";
    header("Location: index.php?msg=$msg");
}

//add user
if (isset($_POST['register'])) {
    $fname = $_POST['f_name'];
    $lname = $_POST['l_name'];
    $email = $_POST['email'];
    $pass1 = $_POST['password1'];
    $pass2 = $_POST['password2'];

    if ($pass1 == $pass2) {
        $hash = password_hash($pass1, PASSWORD_DEFAULT);

        $insert_user = $conn->prepare("INSERT INTO users(user_fname, user_lname,user_email, user_pass) VALUES(?, ?, ?, ?)");
        $insert_user->execute([
            $fname,
            $lname,
            $email,
            $hash
        ]);

        $msg = "User Created!";
        header("Location: register.php?msg=$msg");
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