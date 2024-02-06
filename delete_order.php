<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Pobierz numer zamówienia do usunięcia
    $orderIdToDelete = isset($_POST['orderIdToDelete']) ? intval($_POST['orderIdToDelete']) : 0;

    // Połącz z bazą danych (zmień dane dostępowe)
    $mysqli = new mysqli('localhost', 'root', '', 'sklepik');

    // Sprawdź połączenie
    if ($mysqli->connect_error) {
        die('Błąd połączenia z bazą danych: ' . $mysqli->connect_error);
    }

    // Usuń zamówienie z tabeli hotdog_order
    $deleteQuery = "DELETE FROM hotdog_order WHERE id = $orderIdToDelete";
    if (!$mysqli->query($deleteQuery)) {
        die('Błąd zapytania: ' . $mysqli->error);
    }

    // Zamknij połączenie
    $mysqli->close();

    // Przekieruj na stronę zamówień
    header('Location: index.php');
} else {
    // Jeśli nie, przekieruj na stronę główną
    header('Location: index.php');
}
?>
