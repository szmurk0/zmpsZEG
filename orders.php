<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Zamówień</title>
    <link rel="stylesheet" href="styleOrders.css">
    <!-- Dodaj Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Dodaj animacje z animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

</head>
<body>

    <div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
    </div>


    <div id="ordersContainer">
        <?php
            // Połączenie z bazą danych
            $mysqli = new mysqli('localhost', 'root', '', 'sklepik');

            if ($mysqli->connect_error) {
                die('Błąd połączenia z bazą danych: ' . $mysqli->connect_error);
            }

            // Pobranie zamówień w przygotowaniu
            $query = "SELECT * FROM hotdog_order WHERE status = 1";
            $result = $mysqli->query($query);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='order'>";
                    echo "<p class='order-info'>ID Zamówienia: " .  "<b>" . $row['id'] . "</b>" . "</p>";
                    echo "<p class='order-info'>Hotdog: " . "<b>" . $row['name'] . "</b>" . "</p>";
                    echo "<p class='order-info'>Sos 1: " . "<b>" . $row['sauce1'] . "</b>" . "</p>";
                    echo "<p class='order-info'>Sos 2: " . "<b>" . $row['sauce2'] . "</b>" . "</p>";
                    
                    
                    // Dodano formularz do zmiany statusu
                    echo "<form method='post' action='change_status.php'>";
                    echo "<input type='hidden' name='order_id' value='" . $row['id'] . "'>";
                    echo "<button type='submit'>Zmień status na Gotowy</button>";
                    echo "</form>";

                    echo "</div>";
                }
            } else {
                echo "Brawo! Doczekałeś się chillery! Nie oznacza to że masz się obijać xdds";
            }

            $mysqli->close();
        ?>
    </div>

    <script>

        document.addEventListener('DOMContentLoaded', function () {
            // Ustaw interwał na 10 sekund (10000 milisekund)
            const refreshInterval = 15000;

            // Funkcja do odświeżania strony
            function refreshPage() {
                location.reload();
            }

            // Ustawienie interwału
            setInterval(refreshPage, refreshInterval);
        });
    </script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>
</html>
