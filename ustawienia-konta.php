<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['haslo'];
if($email != false && $password != false){
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['kod'];
        $emaill = $fetch_info['email'];
        if ($emaill == null) {
            header('Location: login-user.php');
        }else if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Salrent</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='glownastyl.css'>
    <script src='main.js'></script>
</head>
<body>
    
    <header>
        <table>
            <colgroup>
                <th><a href="glowna.php">O nas</a></th>
                <th><a href="sale.php">Sale</a></th>
                <th><a href="zdjecia.php">Zdjecia</a></th>
                <th><a href="kontakt.php">Kontakt</a></th>
           </colgroup>
        </table>
    </header>


    <main>  
<div class="panel">
    <p class="powitanie">Zalogowano jako <b><?php echo $fetch_info['imie'] ?></b></p>
    <p class="ustawienia"><a href="ustawienia-konta.php" class="ustawienia">Ustawienia konta</a></p>
    <p class="wyloguj" class="wyloguj"><a href="logout-user.php">Wyloguj</a></p>
    
    
</div>




        <div class="blok">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent quis velit et diam efficitur fermentum. Maecenas vulputate interdum efficitur. Vivamus at ornare diam. Ut in dolor dolor. Proin vel diam a nisl fermentum accumsan. Sed efficitur libero tincidunt sodales sodales. Ut mattis erat felis, ac convallis tellus suscipit id. Integer sit amet egestas dui.

Praesent arcu massa, ullamcorper tincidunt fermentum in, rutrum nec ante. Suspendisse auctor pellentesque enim, a bibendum nulla ultricies a. Donec vitae porta sapien, vel tincidunt orci. Duis eget lectus mattis, scelerisque ex vel, venenatis justo. Praesent eu scelerisque lacus. Vivamus et enim est. Nullam vitae congue libero. Integer posuere ex non ex elementum, tincidunt ornare est ultricies. Morbi congue ac erat sed dapibus. Sed nec est vel mi efficitur auctor vel ut orci. Vivamus laoreet posuere tellus, ac porttitor est ultrices sed. In ultrices mollis purus ac tincidunt.

Proin felis est, elementum vitae velit sed, laoreet accumsan dui. Nullam ac tristique nulla. Nulla quis sapien dictum, semper arcu quis, maximus augue. Mauris nec ullamcorper elit. Donec nec iaculis tellus. Vestibulum dignissim augue bibendum aliquet facilisis. Pellentesque dapibus, augue a aliquet consectetur, tortor nulla convallis ipsum, ac scelerisque est mi ac risus. Duis vel aliquam velit, ut vehicula purus. Praesent lacinia, quam nec facilisis varius, tellus orci hendrerit sem, at fermentum lacus arcu a est. Phasellus scelerisque pulvinar felis ac tincidunt. Curabitur sapien ligula, porttitor nec felis ut, posuere posuere quam. Vestibulum eget urna quis velit iaculis commodo. Maecenas non fermentum felis.

Mauris ac lacus odio. Integer vitae magna interdum, semper ex in, finibus felis. Aenean accumsan risus diam. Proin vel volutpat lorem. Aliquam pulvinar massa quam, eget iaculis arcu cursus sed. In sodales nibh id ante fermentum volutpat. Nunc turpis nisi, dapibus ac ultrices et, auctor vitae sem. Nulla libero risus, pulvinar sed interdum id, accumsan sed neque. Integer efficitur sem ac justo scelerisque auctor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nulla facilisi. Ut in vulputate nisi. Nunc at ex quam. In nec pellentesque eros. Integer sit amet malesuada odio. Donec nibh odio, sodales ut dignissim ac, consequat eget leo.

Morbi pharetra in nunc at ullamcorper. Maecenas cursus ante risus, a congue neque iaculis id. Cras tellus justo, pulvinar a tincidunt id, maximus non ligula. Suspendisse sagittis massa volutpat pulvinar pulvinar. Sed eu odio maximus, venenatis tellus sit amet, vulputate nulla. Cras malesuada felis ex, quis gravida urna fringilla a. Suspendisse massa mi, volutpat eu tincidunt a, scelerisque et dolor.

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent quis velit et diam efficitur fermentum. Maecenas vulputate interdum efficitur. Vivamus at ornare diam. Ut in dolor dolor. Proin vel diam a nisl fermentum accumsan. Sed efficitur libero tincidunt sodales sodales. Ut mattis erat felis, ac convallis tellus suscipit id. Integer sit amet egestas dui.

Praesent arcu massa, ullamcorper tincidunt fermentum in, rutrum nec ante. Suspendisse auctor pellentesque enim, a bibendum nulla ultricies a. Donec vitae porta sapien, vel tincidunt orci. Duis eget lectus mattis, scelerisque ex vel, venenatis justo. Praesent eu scelerisque lacus. Vivamus et enim est. Nullam vitae congue libero. Integer posuere ex non ex elementum, tincidunt ornare est ultricies. Morbi congue ac erat sed dapibus. Sed nec est vel mi efficitur auctor vel ut orci. Vivamus laoreet posuere tellus, ac porttitor est ultrices sed. In ultrices mollis purus ac tincidunt.

Proin felis est, elementum vitae velit sed, laoreet accumsan dui. Nullam ac tristique nulla. Nulla quis sapien dictum, semper arcu quis, maximus augue. Mauris nec ullamcorper elit. Donec nec iaculis tellus. Vestibulum dignissim augue bibendum aliquet facilisis. Pellentesque dapibus, augue a aliquet consectetur, tortor nulla convallis ipsum, ac scelerisque est mi ac risus. Duis vel aliquam velit, ut vehicula purus. Praesent lacinia, quam nec facilisis varius, tellus orci hendrerit sem, at fermentum lacus arcu a est. Phasellus scelerisque pulvinar felis ac tincidunt. Curabitur sapien ligula, porttitor nec felis ut, posuere posuere quam. Vestibulum eget urna quis velit iaculis commodo. Maecenas non fermentum felis.

Mauris ac lacus odio. Integer vitae magna interdum, semper ex in, finibus felis. Aenean accumsan risus diam. Proin vel volutpat lorem. Aliquam pulvinar massa quam, eget iaculis arcu cursus sed. In sodales nibh id ante fermentum volutpat. Nunc turpis nisi, dapibus ac ultrices et, auctor vitae sem. Nulla libero risus, pulvinar sed interdum id, accumsan sed neque. Integer efficitur sem ac justo scelerisque auctor. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Nulla facilisi. Ut in vulputate nisi. Nunc at ex quam. In nec pellentesque eros. Integer sit amet malesuada odio. Donec nibh odio, sodales ut dignissim ac, consequat eget leo.

Morbi pharetra in nunc at ullamcorper. Maecenas cursus ante risus, a congue neque iaculis id. Cras tellus justo, pulvinar a tincidunt id, maximus non ligula. Suspendisse sagittis massa volutpat pulvinar pulvinar. Sed eu odio maximus, venenatis tellus sit amet, vulputate nulla. Cras malesuada felis ex, quis gravida urna fringilla a. Suspendisse massa mi, volutpat eu tincidunt a, scelerisque et dolor.
nt id, maximus non ligula. Suspendisse sagittis massa volutpat pulvinar pulvinar. Sed eu odio maximus, venenatis tellus sit amet, vulputate nulla. Cras malesuada felis ex, quis gravida urna fringilla a. Suspendisse massa mi, volutpat eu tincidunt a, scelerisque et dolor.
    <div class="deletee">   
        <form action="glowna.php" method="POST" autocomplete="">
            <input class="delete" type="submit" name="delete" value="usuń konto" onclick="return confirm('Jesteś pewny że chcesz usunąć konto?')">
        </form>
    </div>
</div>

    </main>
    
<footer>
    <p>Made by SalRent team 205IC</p>
</footer>


</body>
</html>