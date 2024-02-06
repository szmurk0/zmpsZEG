<?php
// Sprawdź, czy dane zostały przesłane
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Pobierz dane z formularza
    $orderId = isset($_POST['orderId']) ? $_POST['orderId'] : '';
    $hotdogType = isset($_POST['hotdogType']) ? $_POST['hotdogType'] : '';
    $sauces = isset($_POST['sauces']) ? implode(', ', $_POST['sauces']) : '';
    $secondSauce = isset($_POST['secondSauce']) ? $_POST['secondSauce'] : '';
    $comments = isset($_POST['comments']) ? $_POST['comments'] : '';
    $status = 'w przygotowaniu';

    // Połącz z bazą danych (zmień dane dostępowe)
    $mysqli = new mysqli('localhost', 'root', '', 'sklepik');

    // Sprawdź połączenie
    if ($mysqli->connect_error) {
        die('Błąd połączenia z bazą danych: ' . $mysqli->connect_error);
    }

    // Wykonaj zapytanie dodające zamówienie
    $queryOrder = "INSERT INTO orders (worker_id, payment_method_id, created) VALUES (1, 2, NULL)";
    if (!$mysqli->query($queryOrder)) {
        die('Błąd zapytania: ' . $mysqli->error);
    }

    // Pobierz ID ostatniego wstawionego zamówienia
    $orderId = $mysqli->insert_id;

    // Przypisz ID artykułu zgodnie z wyborem hotdoga
    switch ($hotdogType) {
        case 'HotDog':
            $articleId = 15;
            break;
        case 'DoubleDog':
            $articleId = 68;
            break;
        case 'ZegDog':
            $articleId = 113;
            break;
        default:
            $articleId = 0;
    }

    // Wykonaj zapytanie dodające artykuł
    $queryArticle = "INSERT INTO articles_sellment (article_id, amount) VALUES ($articleId, 1)";
    if (!$mysqli->query($queryArticle)) {
        die('Błąd zapytania: ' . $mysqli->error);
    }

    // Dodawanie do nowej tabeli
    $q = "SELECT * FROM hotdog_order ORDER BY id DESC limit 1";
    $result = $mysqli->query($q);

    if (isset($result)){
        $row = $result->fetch_assoc();
        $code = $row["code"]+1;
        if($code == 100) {
            $code = 1;
        } 
    } else {
        $code = 1;
    }

    $q = "INSERT INTO hotdog_order VALUES (NULL, $code, '$hotdogType', '$sauces', '$secondSauce', 1)";

    $mysqli->query($q);


    // Zamknij połączenie
    $mysqli->close();

    // Przekieruj na stronę zamówień
    header('Location: index.php');
} else {
    // Jeśli nie, przekieruj na stronę główną
    header('Location: index.php');
}
?>
