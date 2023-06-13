<?php require_once "pages/controllerUserData.php"; ?>
<?php require "pages/count_users.php"; ?>
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
      header('Location: pages/login.php');
    } else if ($status == "verified") {
      if ($code != 0) {
        header('Location: pages/login.php');
      }
    } else {
      header('Location: pages/login.php');
    }
  }
} else {
  header('Location: pages/login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="dist/img/SalrentLogo1.png" alt="SalrentLogo1" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/SalrentLogo2.png" alt="SalrentLogo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/brek.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="index.php" class="d-block"><?php echo $fetch_info['imie'] ?> <?php echo $fetch_info['nazwisko'] ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">EXAMPLES</li>
          <li class="nav-item">
            <a href="./index.php" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Calendar
                <span class="badge badge-info right">2</span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="./index.php" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Gallery
              </p>
            </a>
          </li>
                    <li class="nav-item">
            <a href="boardrooms.php" class="nav-link active">
              <i class="nav-icon fas fa-bed"></i>
              <p>
                Boardrooms
              </p>
            </a>
          </li>
          <li class="nav-header">MISCELLANEOUS</li>
          <li class="nav-item">
            <a href="pages/logout-user.php" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Boardrooms</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
  <!-- Content Wrapper. Contains page content -->
  <section class="content">
        <!-- Main row -->
     
        <form method="post" action="boardrooms.php">
        <div class="search-container">
        <input type="text" name="search" class="form-control search-input" id="search" placeholder="Wprowadź numery sali">
        <select name="status" class="form-control status-select">
                <option value="">Wszystkie Statusy Sal</option>
                <option value="1">Dostępna</option>
                <option value="0">Niedostępna</option>
            </select>
        <button type="submit" class="btn btn-info search-button">Szukaj</button>
    </div>
    </form>
    <style>
        .status-select {
            width: auto;
            display: inline-block;
            margin-left: 10px;
        }
        .search-container {
        display: flex;
        align-items: center;
    }

    .search-input {
        width: 300px; /* Dostosuj szerokość według preferencji */
    }

    .search-button {
        margin-left: 10px; /* Dostosuj margines według preferencji */
    }
    </style>


<?php
// Połączenie z bazą danych
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "salrent";

$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}

// Pobranie danych z bazy
$searchQuery = isset($_POST['search']) ? $_POST['search'] : '';
$statusFilter = isset($_POST['status']) ? $_POST['status'] : '';

// Jeśli nie podano żadnego zapytania, pobierz wszystkie sale
$sql = "SELECT * FROM sale WHERE 1=1"; // Początkowe zapytanie zawsze prawdziwe

// Dodanie warunków do zapytania SQL w zależności od wartości filtrowania
if ($statusFilter === '1') {
    $sql .= " AND status = 1";
} elseif ($statusFilter === '0') {
    $sql .= " AND status = 0";
}

if (!empty($searchQuery)) {
    $searchArray = preg_split('/[, ]+/', $searchQuery); // Podział wprowadzonego ciągu na tablicę numerów sali

    // Generowanie warunku SQL dla każdego numeru sali
    $conditions = [];
    foreach ($searchArray as $searchNumber) {
        $searchNumber = trim($searchNumber); // Usunięcie ewentualnych spacji z numeru sali
        $conditions[] = "nr = '$searchNumber'";
    }

    // Połączenie warunków za pomocą operatora OR
    $conditionsString = implode(' OR ', $conditions);

    $sql .= " AND ($conditionsString)";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Wyświetlanie danych w tabeli z użyciem Bootstrapa
  echo '<form method="post" action="">'; // Formularz z polem wyboru
  echo '<button type="submit" class="btn btn-primary" onclick="return confirmRoomStatusChange(this.form)">Zmień status dla zaznaczonych sal</button>';
  echo '<input type="hidden" id="selectedRooms" name="selected_rooms" value="">'; // Ukryte pole przechowujące numery zaznaczonych sal
  echo '<div style="overflow-x: auto;">'; // Kontener z obszarem przewijania
  echo '<table class="table table-striped">';
  echo '<thead><tr><th><input type="checkbox" id="selectAll" onchange="selectAllCheckboxes()"></th><th>nr</th><th>pietro</th><th>typ</th><th>miejsca</th><th>Status</th><th>Zmiana Statusu</th></tr></thead>';
  echo '<tbody>';
  echo '<br>';
    // Obsługa zmiany wartości
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $errors = array(); // Tablica na błędy
        $changed_rooms = array(); // Tablica na zmienione sale

        if (isset($_POST["selected_rooms"]) && !empty($_POST["selected_rooms"])) {
            $selected_rooms = $_POST["selected_rooms"];

            foreach ($selected_rooms as $selected_room) {
                // Pobranie obecnej wartości statusu
                $status_sql = "SELECT status FROM sale WHERE nr = '$selected_room'";
                $status_result = $conn->query($status_sql);
                $status_row = $status_result->fetch_assoc();
                $current_status = $status_row["status"];

                // Zmiana statusu na przeciwny
                $new_status = ($current_status == 1) ? 0 : 1;

                // Aktualizacja wartości w bazie danych dla wybranej sali
                $update_sql = "UPDATE sale SET status = '$new_status' WHERE nr = '$selected_room'";
                if ($conn->query($update_sql) !== TRUE) {
                    $errors[] = 'Błąd podczas aktualizacji wartości dla sali ' . $selected_room . ': ' . $conn->error;
                } else {
                    $changed_rooms[] = $selected_room;
                }
            }

            if (empty($errors)) {
                $changed_rooms_count = count($changed_rooms);
                $changed_rooms_list = implode(", ", $changed_rooms);
                $message = "Status został zmieniony dla sal: $changed_rooms_list";
                echo '<div class="alert alert-success" role="alert">' . $message . '</div>';
                echo '<meta http-equiv="refresh" content="0">';
            }
        } elseif (isset($_POST["selected_room"]) && !empty($_POST["selected_room"])) {
            $selected_room = $_POST["selected_room"];

            // Pobranie obecnej wartości statusu
            $status_sql = "SELECT status FROM sale WHERE nr = '$selected_room'";
            $status_result = $conn->query($status_sql);
            $status_row = $status_result->fetch_assoc();
            $current_status = $status_row["status"];

            // Zmiana statusu na przeciwny
            $new_status = ($current_status == 1) ? 0 : 1;

            // Aktualizacja wartości w bazie danych dla wybranej sali
            $update_sql = "UPDATE sale SET status = '$new_status' WHERE nr = '$selected_room'";
            if ($conn->query($update_sql) !== TRUE) {
                $errors[] = 'Błąd podczas aktualizacji wartości dla sali ' . $selected_room . ': ' . $conn->error;
            } else {
                $changed_rooms[] = $selected_room;
            }

            if (empty($errors)) {
                $changed_rooms_count = count($changed_rooms);
                $changed_rooms_list = implode(", ", $changed_rooms);
                $message = "Status został zmieniony dla sal: $changed_rooms_list";
                echo '<div class="alert alert-success" role="alert">' . $message . '</div>';
                echo '<meta http-equiv="refresh" content="0">';
            }
        }

        // Wyświetlanie wszystkich błędów
        if (!empty($errors)) {
            echo '<div class="alert alert-danger" role="alert">';
            echo '<ul>';
            foreach ($errors as $error) {
                echo '<li>' . $error . '</li>';
            }
            echo '</ul>';
            echo '</div>';
        }
    }

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td><input type="checkbox" name="selected_rooms[]" value="' . $row["nr"] . '"></td>'; // Pole wyboru (checkbox)
        echo '<td>' . $row["nr"] . '</td>';
        echo '<td>' . $row["pietro"] . '</td>';
        echo '<td>' . $row["typ"] . '</td>';
        echo '<td>' . $row["miejsca"] . '</td>';
        echo '<td>';
        if ($row["status"] == 1) {
            echo '<span class="badge badge-success">Dostępna</span>';
        } else {
            echo '<span class="badge badge-danger">Niedostępna</span>';
        }
        echo '</td>';
        echo '<td>
        <button type="button" class="btn btn-sm btn-info" onclick="confirmRoomStatusChange1(\'' . $row["nr"] . '\')">Zmień status</button>
        <input type="hidden" name="selected_room" value="' . $row["nr"] . '">
        </td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
    echo '</div>';
    echo '</form>';
} else {
    echo '<div class="alert alert-danger" role="alert">Brak wyników spełniających kryteria wyszukiwania.</div>';
}

$conn->close();
?>
<!-- Poniżej znajduje się pozostała część Twojego kodu HTML i PHP -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function selectAllCheckboxes() {
    var checkboxes = document.getElementsByName('selected_rooms[]');
    var selectAllCheckbox = document.getElementById('selectAll');

    for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = selectAllCheckbox.checked;
    }
  }
  
  function confirmRoomStatusChange(form) {
    event.preventDefault(); // Przechwytuj zdarzenie submit
    var selectedRooms = document.getElementsByName("selected_rooms[]");
    var selectedRoomsArray = [];

    for (var i = 0; i < selectedRooms.length; i++) {
        if (selectedRooms[i].checked) {
            selectedRoomsArray.push(selectedRooms[i].value);
        }
    }

    if (selectedRoomsArray.length === 0 || selectedRoomsArray.length === 1) {
        Swal.fire({
            icon: 'error',
            title: 'Błąd',
            text: 'Proszę zaznaczyć przynajmniej dwie sale.'
        });
        return false;
    }

    document.getElementById("selectedRooms").value = selectedRoomsArray;

    Swal.fire({
        icon: 'question',
        title: 'Potwierdzenie',
        text: 'Czy na pewno chcesz zmienić status dla zaznaczonych sal: ' + selectedRoomsArray.join(", ") + '?',
        showCancelButton: true,
        confirmButtonText: 'Tak',
        cancelButtonText: 'Nie'
    }).then((result) => {
        if (result.isConfirmed) {
            // Kontynuuj zapis lub wysłanie formularza
            form.submit();
        }
    });
}

function confirmRoomStatusChange1(roomNumber) {
    var selectedRooms = document.getElementsByName("selected_rooms[]");
    var selectedRoomsArray = [];

    for (var i = 0; i < selectedRooms.length; i++) {
        if (selectedRooms[i].checked) {
            selectedRoomsArray.push(selectedRooms[i].value);
        }
    }

    if (selectedRoomsArray.length > 0) {
        Swal.fire({
            icon: 'error',
            title: 'Błąd',
            text: 'Nie można zmienić statusu mając zaznaczone inne sale.'
        });
        return false; // Przerwij zapis lub wysłanie formularza
    }

    Swal.fire({
        icon: 'question',
        title: 'Potwierdzenie',
        text: 'Czy na pewno chcesz zmienić status dla sali ' + roomNumber + '?',
        showCancelButton: true,
        confirmButtonText: 'Tak',
        cancelButtonText: 'Nie'
    }).then((result) => {
        if (result.isConfirmed) {
            // Utwórz formularz dynamicznie
            var form = document.createElement('form');
            form.method = 'post';

            // Dodaj ukryte pole z numerem sali
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'selected_room';
            input.value = roomNumber;
            form.appendChild(input);

            // Dodaj formularz do ciała dokumentu
            document.body.appendChild(form);

            // Wyślij formularz
            form.submit();

            return true;
        }
    });
}
</script>










<br><BR><br>

        <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
    <!-- /.content -->
  </section>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022-2023 <a href="">Salrent</a>.</strong>
    All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
