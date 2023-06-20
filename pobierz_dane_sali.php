<?php
// Połączenie z bazą danych
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "salrent";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Sprawdź czy przekazano numer sali
  if (isset($_POST['roomNumber'])) {
    $roomNumber = $_POST['roomNumber'];

    // Wykonaj zapytanie SQL, aby pobrać dane konkretnej sali
    $query = "SELECT pietro, typ, miejsca FROM sale WHERE nr = '$roomNumber'";
    
    // Wykonaj zapytanie do bazy danych
    $result = $conn->query($query);
    
    // Sprawdź czy zapytanie zwróciło wynik
    if ($result->num_rows > 0) {
      // Przygotuj dane sali jako tablicę asocjacyjną lub obiekt JSON
      $row = $result->fetch_assoc();
      $data = [
        'pietro' => $row["pietro"],
        'typ' => $row["typ"],
        'miejsca' => $row["miejsca"],
      ];
      
      // Zwróć dane jako JSON
      echo json_encode($data);
    } else {
      // Brak wyników dla podanego numeru sali
      echo 'Nie znaleziono danych dla podanego numeru sali.';
    }
  } else {
    // Nie przekazano numeru sali
    echo 'Nieprawidłowe żądanie.';
  }
} else {
  // Nieprawidłowa metoda żądania
  echo 'Nieprawidłowe żądanie.';
}

// Zamknij połączenie z bazą danych
?>
