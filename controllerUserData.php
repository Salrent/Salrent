<?php
session_start();
require "connection.php";
$email = "";
$name = "";
$errors = array();


//Po wciśnięciu przycisku login
if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $check_email = "SELECT * FROM user WHERE email = '$email'";
    $res = mysqli_query($con, $check_email);
    if (mysqli_num_rows($res) > 0) {
        $fetch = mysqli_fetch_assoc($res);
        $fetch_pass = $fetch['haslo'];
        if (password_verify($password, $fetch_pass)) {
            $_SESSION['email'] = $email;
            $status = $fetch['status'];
            $admin = $fetch['admin'];
            if ($status == 'verified' && $admin == '1') {
                $_SESSION['email'] = $email;
                $_SESSION['haslo'] = $password;
                $_SESSION['admin'] = $admin;
                header('location: ../index.php');
            } else if($admin == '0'){
                $errors['email'] = "To konto nie jest kontem administracyjnym!";
        }
        }else{
            $errors['email'] = "Nieprawidłowy email lub hasło!";
        }
    } else if($email=="" && $password==""){
        $errors['email'] = "Wprowadź dane!";
    }else{
        $errors['email'] = "Nieprawidłowy email lub hasło!";
    }
}


if (isset($_POST['login-now'])) {
    header('Location: login.php');
}
?>