<?php require_once "controllerUserData.php"; ?>
<?php
$email = $_SESSION['email'];
$password = $_SESSION['haslo'];
if ($email != false && $password != false) {
  $sql = "SELECT * FROM user WHERE email = '$email'";
  $run_Sql = mysqli_query($con, $sql);
  if ($run_Sql) {
    $fetch_info = mysqli_fetch_assoc($run_Sql);
    $status = $fetch_info['status'];
    $code = $fetch_info['kod'];
    $emaill = $fetch_info['email'];
    if ($emaill == null) {
      header('Location: login-user.php');
    } else if ($status == "verified") {
      if ($code != 0) {
        header('Location: reset-code.php');
      }
    } else {
      header('Location: user-otp.php');
    }
  }
} else {
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
  <link rel='stylesheet' href='css-zdjecia/glownastyl.css'>
  <link rel='stylesheet' href='css-zdjecia/navbar.css'>
  <link rel='stylesheet' href='css-zdjecia/sidebar.css'>
  <link rel='stylesheet' href='css-zdjecia/footer.css'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
</head>

<body>

  <div id="mainNavigation">
    <nav role="navigation">
      <div class="py-3 text-center border-bottom">
        <img src="css-zdjecia/zdjecia/tescik.png" alt="" class="invert">
      </div>
    </nav>
    <div class="navbar-expand-md">
      <div class="navbar-dark text-center my-2">
        <button class="navbar-toggler w-75" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span> <span class="align-middle">Menu</span>
        </button>
      </div>
      <div class="text-center mt-3 collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav mx-auto ">
          <li class="nav-item">
            <a class="nav-link" href="glowna.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sale.php">Sale</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="zdjecia.php">Zdjecia</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="kontakt.php">Kontakt</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              Test
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="#">Blog</a></li>
              <li><a class="dropdown-item" href="#">About Us</a></li>
              <li><a class="dropdown-item" href="#">Contact us</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <main>
    <div class="panel">
      <nav id="sidebar">
        <div class="custom-menu">
          <button type="button" id="sidebarCollapse" class="btn btn-primary">
          </button>
        </div>
        <div class="img bg-wrap text-center py-4">
          <div class="user-logo">
            <h3>
              <?php echo $fetch_info['imie'] ?>
            </h3>
          </div>
        </div>
        <ul class="list-unstyled components mb-5">
          <li class="marine">
            <a href="glowna.php"><span class="fa fa-home mr-3"></span> Home</a>
          </li>
          <li class="active">
            <a href="ustawienia-konta.php"><span class="fa fa-cog mr-3"></span> Ustawienia</a>
          </li>
          <li>
            <a href="logout-user.php"><span class="fa fa-sign-out mr-3"></span> Wyloguj</a>
          </li>
        </ul>

      </nav>


    </div>




    <div class="blok">
      <?php
      if (count($errors) == 1) {
        ?>
        <div class="alert alert-danger text-center">
          <?php
          foreach ($errors as $showerror) {
            echo $showerror;
          }
          ?>
        </div>
        <?php
      } elseif (count($errors) > 1) {
        ?>
        <div class="alert alert-danger">
          <?php
          foreach ($errors as $showerror) {
            ?>
            <li>
              <?php echo $showerror; ?>
            </li>
            <?php
          }
          ?>
        </div>
        <?php
      }
      ?>
      <div class="daneuzytkownika">
        <p>DANE UŻYTKOWNIKA</p>
      </div>
      <form action="ustawienia-konta.php" method="post">
        <div class="formularz">
          <h5 class="imief">Imie</h5><input class="tescik" type="text" name="name"
            value="<?php echo $fetch_info['imie'] ?>"><br /><br />
          <h5 class="nazwiskof">Nazwisko</h5><input class="tescik" type="text" name="surname"
            value="<?php echo $fetch_info['nazwisko'] ?>"><br /><br />
          <h5 class="miastof">Miasto</h5><input class="tescik" type="text" name="city"
            value="<?php echo $fetch_info['miasto'] ?>"><br />
          <br />
          <input class="aktualizuj" type="submit" name="aktualizuj" value="aktualizuj"
            onclick="return confirm('Jesteś pewny że chcesz zmienić swoje dane?')">
        </div>
      </form>

      <br>
      <div class="zmianahasla">
          <p>ZMIANA HASŁA</p>
      </div>
      <form method="post" action="ustawienia-konta.php">
        <div class="formularz">
          <label for="current_password">Obecne hasło:</label>
          <input class="zmienhaslo" type="password" id="current_password" name="current_password"><br>
          <label for="new_password">Nowe hasło:</label>
          <input class="zmienhaslo" type="password" id="new_password" name="new_password"><br>
          <label for="confirm_password">Potwierdź hasło:</label>
          <input class="zmienhaslo" type="password" id="confirm_password" name="confirm_password"><br><br>
          <input class="zmienhaslo" type="submit" name="zmienhaslo" value="Zmień hasło"
            onclick="return confirm('Jesteś pewny że chcesz zmienić swoje hasło?')">
        </div>
      </form>
      <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
      <div class="deletee">
        <form action="glowna.php" method="POST" autocomplete="">
          <input class="delete" type="submit" name="delete" value="usuń konto"
            onclick="return confirm('Jesteś pewny że chcesz usunąć konto?')">
        </form>
      </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </main>

  <footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-8 col-sm-6 col-xs-12">
          <p class="copyright-text">Copyright &copy; 2022 All Rights Reserved by
            <a href="glowna.php">SalRent</a>.
          </p>
        </div>

        <div class="col-md-4 col-sm-6 col-xs-12">
          <ul class="social-icons">
            <li><a class="facebook" href="https://facebook.com/"><i class="bi bi-facebook"></i></a></li>
            <li><a class="twitter" href="https://twitter.com/"><i class="bi bi-twitter"></i></a></li>
            <li><a class="instagram" href="https://instagram.com/"><i class="bi bi-instagram"></i></a></li>
            <li><a class="youtube" href="https://youtube.com/"><i class="bi bi-youtube"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>


</body>

</html>