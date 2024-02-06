<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Połącz z bazą danych
    $mysqli = new mysqli('localhost', 'root', '', 'sklepik');

    if ($mysqli->connect_error) {
        die('Błąd połączenia z bazą danych: ' . $mysqli->connect_error);
    }

    // Pobierz ID zamówienia do zmiany statusu
    $orderId = $_POST['order_id'];

    // Zmień status zamówienia na gotowy
    $updateQuery = "UPDATE hotdog_order SET status = 'gotowy' WHERE id = $orderId";

    if (!$mysqli->query($updateQuery)) {
        die('Błąd zapytania: ' . $mysqli->error);
    }

    $mysqli->close();

    // Przekieruj na stronę zamówień
    header('Location: orders.php');
} else {
    // Jeśli nie, przekieruj na stronę główną
    header('Location: index.php');
}
?>
