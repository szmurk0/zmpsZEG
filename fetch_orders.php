<?php
// Połączenie z bazą danych
$mysqli = new mysqli('localhost', 'root', '', 'sklepik');

if ($mysqli->connect_error) {
    die('Błąd połączenia z bazą danych: ' . $mysqli->connect_error);
}

// Pobranie statusu z parametrów GET
$status = $_GET['status'];

// Pobranie zamówień z bazy danych na podstawie statusu
$query = "SELECT * FROM hotdog_order WHERE status = '$status'";
$result = $mysqli->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='order'>";
        echo "<p>ID Zamówienia: " . $row['id'] . "</p>";
        echo "<p>Hotdog: " . $row['name'] . "</p>";
        echo "<p>Sos 1: " . $row['sauce1'] . "</p>";
        echo "<p>Sos 2: " . $row['sauce2'] . "</p>";
        echo "<p>Status: " . $row['status'] . "</p>";
        echo "</div>";
    }
} else {
    echo "Brak zamówień.";
}

$mysqli->close();
?>
