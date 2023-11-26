<?php
session_start();
include "db_conn.php";

function validate($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['uname']) && isset($_POST['password'])) {

    $uname = validate($_POST['uname']);
    $email = validate($_POST['email']);
    $pass = validate($_POST['password']);
    $confirmpassword = validate($_POST['confirmpassword']);

    if (empty($uname)) {
        header("Location: index.php?error=User Name is required");
        exit();
    }
    if (empty($email)) {
        header("Location: index.php?error=Email is required");
        exit();
    }

    if (empty($pass)) {
        header("Location: index.php?error=Password is required");
        exit();
    }
    if (empty($confirmpassword)) {
        header("Location: index.php?error=Confirm Password is required");
        exit();
    }

    $sql = "SELECT * FROM users WHERE user_name='$uname' AND email='$email' AND password='$pass' AND confirmpassword='$confirmpassword'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        echo "Logged In!";
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        header("Location: home.php");
        exit();
    } else {
        header("Location: index.php?error=Incorrect User Name or Password");
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>
