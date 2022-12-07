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
        $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data = "INSERT INTO user (imie, nazwisko, email, haslo, kod, status)
                        values('$name', '$surname', '$email', '$encpass', '$code', '$status')";
        $data_check = mysqli_query($con, $insert_data);
        if($data_check){
            $subject = "Kod weryfikacyjny email";
            $message = "Twój kod weryfikacyjny to $code";
            $sender = "From: kalat123456789@gmail.com";
            if(mail($email, $subject, $message, $sender)){
                $info = "Wysłaliśmy twój kod weryfikacyjny na email - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: user-otp.php');
                exit();
            }else{
                $errors['otp-error'] = "Nie udało się wysłać kodu!";
            }
        }else{
            $errors['db-error'] = "Nie powiodło się podczas wstawiania danych do bazy!";
        }
    }

}

    //Po wciśnięciu przycisku weryfikacji
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM user WHERE kod = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['kod'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE user SET kod = $code, status = '$status' WHERE kod = $fetch_code";
            $update_res = mysqli_query($con, $update_otp);
            if($update_res){
                $_SESSION['imie'] = $name;
                $_SESSION['email'] = $email;
                header('location: home.php');
                exit();
            }else{
                $errors['otp-error'] = "Nie powiodło się podczas aktualizacji kodu!";
            }
        }else{
            $errors['otp-error'] = "Wprowadziłeś nieprawidłowy kod!";
        }
    }

    //Po wciśnięciu przycisku login
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $check_email = "SELECT * FROM user WHERE email = '$email'";
        $res = mysqli_query($con, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['haslo'];
            if(password_verify($password, $fetch_pass)){
                $_SESSION['email'] = $email;
                $status = $fetch['status'];
                if($status == 'verified'){
                  $_SESSION['email'] = $email;
                  $_SESSION['haslo'] = $password;
                    header('location: home.php');
                }else{
                    $info = "Wygląda na to, że nie zweryfikowałeś jeszcze swojego maila. - $email";
                    $_SESSION['info'] = $info;
                    header('location: user-otp.php');
                }
            }else{
                $errors['email'] = "Nieprawidłowy email lub hasło!";
            }
        }else{
            $errors['email'] = "Wygląda na to, że nie jesteś jeszcze zarejestrowany! Kliknij na dolny link, aby się zarejestrować.";
        }
    }
     //Po wciśnięciu przycisku kontynuuj w forgot-password
     if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $check_email = "SELECT * FROM user WHERE email='$email'";
        $run_sql = mysqli_query($con, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $insert_code = "UPDATE user SET kod = $code WHERE email = '$email'";
            $run_query =  mysqli_query($con, $insert_code);
            if($run_query){
                $subject = "Kod do zresetowania hasła";
                $message = "Twój kod do zresetowania hasło to $code";
                $sender = "From: kalat123456789@gmail.com";
                if(mail($email, $subject, $message, $sender)){
                    $info = "Wysłaliśmy na twój email kod do zresetowania hasła - $email";
                    $_SESSION['info'] = $info;
                    $_SESSION['email'] = $email;
                    header('location: reset-code.php');
                    exit();
                }else{
                    $errors['otp-error'] = "Wystąpił błąd w wysłaniu kodu!";
                }
            }else{
                $errors['db-error'] = "Coś poszło nie tak!";
            }
        }else{
            $errors['email'] = "Ten adres email nie istnieje!";
        }
    }

    //Po wciśnięciu przycisku zatwierdz
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
        $check_code = "SELECT * FROM user WHERE kod = $otp_code";
        $code_res = mysqli_query($con, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $email = $fetch_data['email'];
            $_SESSION['email'] = $email;
            $info = "Proszę stworzyć nowe hasło";
            $_SESSION['info'] = $info;
            header('location: new-password.php');
            exit();
        }else{
            $errors['otp-error'] = "Wprowadziłeś błędny kod";
        }
    }

    //Po wciśnięciu przycisku zmień hasło
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
        $uppercase = preg_match('@[A-Z]@', $password);
        $lowercase = preg_match('@[a-z]@', $password);
        $number = preg_match('@[0-9]@', $password);
        $specialChars = preg_match('@[^\w]@', $password);
        
        if($password !== $cpassword){
            $errors['password'] = "Hasła różnią się od siebie!";
        }else if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
            $errors['password'] = "Hasło musi być silne!";
        }else{
            $code = 0;
            $email = $_SESSION['email'];
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE user SET kod = $code, haslo = '$encpass' WHERE email = '$email'";
            $run_query = mysqli_query($con, $update_pass);
            if($run_query){
                $info = "Twoje hasło zostało zmienione. Teraz możesz sie zalogować nowym hasłem.";
                $_SESSION['info'] = $info;
                header('Location: password-changed.php');
            }else{
                $errors['db-error'] = "Wystąpił błąd ze zmianą hasła!";
            }
        }
    }   

    if(isset($_POST['login-now'])){
        header('Location: login-user.php');
    }    

?>