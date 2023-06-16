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
    if ($status == "verified") {
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
  <link rel='stylesheet' href='tenstyl.css'>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
    crossorigin="anonymous"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js'></script>
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
            <a class="nav-link active" aria-current="page" href="sale.php">Sale</a>
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
      <li>
        <a href="myReservations.php"><span class="fa fa-list mr-3"></span> Moje rezerwacje</a>
      </li>
      <li class="marine">
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
    $con = mysqli_connect('localhost', 'root', '', 'salrent');
    $kw2 = "SELECT nr, pietro, typ, status, miejsca FROM sale";
    $res2 = $con->query($kw2);

    echo "<table>
            <tr>
              <th>Numer Sali</th>
              <th>Pietro</th>
              <th>Typ</th>
              <th>Ilość miejsc</th>
            </tr>";

    while ($row = $res2->fetch_array()) {
      echo "<tr>";
      echo "<td>".$row['0']."</td>";
      echo "<td>".$row['1']."</td>";
      echo "<td>".$row['2']."</td>";
      echo "<td>".$row['4']."</td>";
      echo "</tr>";
    }
    echo "</table>";
  ?>
  <form method="POST">
    <label for="sale">Wybierz salę:</label>
    <select name="sale" id="sale" style="width:14%;">
      <option value='' disabled selected>Wybierz salę</option>
      <?php
        $kw3 = "SELECT nr, pietro, typ, status, miejsca FROM sale";
        $res3 = $con->query($kw3);

        while ($row = $res3->fetch_array()) {
          echo "<option value='".$row[0]."'>".$row[0]."</option>";
        }
      ?>
    </select>

    <label for="dataod">Data i godzina od:</label>
    <input type="datetime-local" name="dataod" id="dataod">

    <label for="datado">Data i godzina do:</label>
    <input type="datetime-local" name="datado" id="datado">

    <input type="submit" name="submit" value="Rezerwuj" style="margin-top: 10px;">
  </form>
  <?php
  if (isset($_POST['submit'])) {
    $dataod = $_POST['dataod'];
    $datado = $_POST['datado'];
    $sala = isset($_POST['sale']) ? $_POST['sale'] : null;
    $errors = array();

    // Walidacja danych
    if (!isset($_POST['sale'])) {
      $errors[] = "Nie wybrano sali.";
    } elseif (empty($_POST['sale'])) {
      $errors[] = "Nie wybrano sali.";
    }

    if (empty($dataod) || empty($datado)) {
      $errors[] = "Nie podano pełnego zakresu dat.";
    } else {
      $today = date('Y-m-d');
      if ($dataod < $today || $datado < $today) {
        $errors[] = "Nie można złożyć rezerwacji na przeszłą datę.";
      }
      if ($dataod > $datado) {
        $errors[] = "Data początkowa musi być wcześniejsza niż data końcowa.";
      }
    }

    if (count($errors) > 0) {
      // Wyświetlanie błędów
      foreach ($errors as $error) {
        echo "<p style='color:red;'>$error</p>";
      }
    } else {
      // Sprawdzenie dostępności sali
      $kw4 = "SELECT COUNT(*) FROM rezerwacje WHERE sala = '$sala' AND ((data_od BETWEEN '$dataod' AND '$datado') OR (data_do BETWEEN '$dataod' AND '$datado') OR ('$dataod' BETWEEN data_od AND data_do) OR ('$datado' BETWEEN data_od AND data_do))";
      $res4 = $con->query($kw4);
      $row = $res4->fetch_row();
      $liczbaRezerwacji = $row[0];

      if ($liczbaRezerwacji > 0) {
        echo "<p style='color:red;'>Sala jest zajęta w podanym terminie. Proszę wybrać inną datę lub godzinę.</p>";
      } else {
        // Złożenie rezerwacji
        $kw5 = "INSERT INTO rezerwacje (sala, data_od, data_do) VALUES ('$sala','$dataod','$datado')";
        $res5 = $con->query($kw5);

        if ($res5) {
          echo "<p style='color:green;'>Rezerwacja złożona pomyślnie.</p>";
        } else {
          echo "<p style='color:red;'>Wystąpił błąd podczas rezerwacji. Proszę spróbować ponownie.</p>";
        }
      }
    }
  }
  ?>


    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </main>
<br>
<br>
<br>
<br>
<br>
<br>

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
