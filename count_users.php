<?php
$conn = mysqli_connect('localhost', 'root', '', 'salrent');

// Zapytanie SQL do zliczenia liczby użytkowników
$sql = "SELECT COUNT(*) AS userCount FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $userCount = $row["userCount"];
} else {
    $userCount = 0;
}

// Zamknięcie połączenia z bazą danych
$conn->close();

// Zwrócenie liczby użytkowników jako odpowiedź na żądanie AJAX
echo $userCount;
?>