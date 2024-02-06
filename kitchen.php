<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kuchnia - Status Zamówień</title>
    <link rel="stylesheet" href="styleKitchen.css">
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

    <div class="order-column">
        <h1>W przygotowaniu</h1><br><br><br>
        <?php
        // Połączenie z bazą danych
        $mysqli = new mysqli('localhost', 'root', '', 'sklepik');

        if ($mysqli->connect_error) {
            die('Błąd połączenia z bazą danych: ' . $mysqli->connect_error);
        }

        // Pobranie zamówień w przygotowaniu
        $query = "SELECT id, status FROM hotdog_order WHERE status = 1";
        $result = $mysqli->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='order-number'>";
                echo ($row['id'] < 10) ? "00" . $row['id'] : "0" . $row['id'];
                echo "</p>";
                echo "</div>";
            }
        } else {
            echo "";
        }

        $mysqli->close();
        ?>
    </div>

    <div class="order-column">
        <h1>Gotowe</h1><br><br><br>
        <?php
        // Połączenie z bazą danych
        $mysqli = new mysqli('localhost', 'root', '', 'sklepik');

        if ($mysqli->connect_error) {
            die('Błąd połączenia z bazą danych: ' . $mysqli->connect_error);
        }

        // Pobranie zamówień gotowych
        $query = "SELECT id, status FROM hotdog_order WHERE status = 0";
        $result = $mysqli->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='order-number'>";
                echo ($row['id'] < 10) ? "00" . $row['id'] : "0" . $row['id'];
                echo "</p>";
                echo "</div>";
            }
        } else {
            echo "";
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


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


</body>
</html>
