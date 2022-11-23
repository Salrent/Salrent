<?php 
session_start();
require "connection.php";
$email = "";
$name = "";
$errors = array();

//po kliknięciu przycisku zarejestruj
if(isset($_POST['signup'])){
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $surname = mysqli_real_escape_string($con, $_POST['surname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
    if (!preg_match("/^[a-zA-Z -]+$/",$name)) {
        $errors['name'] = "Imie musi się składać tylko z liter!";
      } 
    if (!preg_match("/^[a-zA-Z -]+$/",$surname)) {
        $errors['surname'] = "Nazwisko musi się składać tylko z liter!";
      } 
    if($password !== $cpassword){
        $errors['password'] = "Podane hasła różnią się od siebie!";
    }
    if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
        $errors['password'] = "Hasło musi być silne!";
    }
    $email_check = "SELECT * FROM user WHERE email = '$email'";
    $res = mysqli_query($con, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email który chcesz wprowadzić już istnieje!";
    }
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $insert_data = "INSERT INTO user (imie, nazwisko, email, haslo)
                        values('$name', '$surname', '$email', '$encpass')";
        $data_check = mysqli_query($con, $insert_data);
    }
} 
?>