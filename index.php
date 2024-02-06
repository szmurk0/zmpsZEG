<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleIndex.css">
    <title>Zamówienie HotDoga</title>
    <style>
        /* Dodaj odpowiednie style CSS według potrzeb */
    </style>
</head>
<body>

    <div>
        <div class="wave"></div>
        <div class="wave"></div>
        <div class="wave"></div>
    </div>

    <form id="orderForm" method="post" action="process_order.php">
        <input type="hidden" id="orderId" name="orderId">

        <label for="hotdogType">Typ HotDoga:</label>
        <select id="hotdogType" name="hotdogType" required>
            <option value="HotDog">HotDog</option>
            <option value="DoubleDog">DoubleDog</option>
            <option value="ZegDog">ZegDog</option>
        </select>

        <br><br><br><label for="sauces">Sos 1:</label>
        <select id="sauces" name="sauces[]">
            <option value="Brak">Brak</option>
            <option value="1000 Wysp">Sos 1000 Wysp</option>
            <option value="Ketchup">Ketchup</option>
            <option value="Musztarda">Musztarda</option>
            <option value="Arabski">Sos Arabski</option>
            <option value="Amerykański">Sos Amerykański</option>
            <option value="BBQ">Sos BBQ</option>
            <option value="Czosnkowy">Sos Czosnkowy</option>
            <option value="Sriracha">Sos Sriracha</option>
            <option value="Serowy">Sos Serowy</option>
            <option value="Serowy Chilli">Sos Ser-Chilli</option>
            <option value="Sweet Chilli">Sos Sweet Chilli</option>
            <option value="Remoulada">Sos Remoulada</option>
            <option value="Musztarda-Miód">Sos Musztardowo-Miodowy</option>
            <option value="Jalapenio">Sos Jalapeno</option>
            <option value="Karolinka">Sos Karolinki</option>
        </select><br>

        <br><br><br><label for="secondSauce">Sos 2:</label>
        <select id="secondSauce" name="secondSauce">
            <option value="Brak">Brak</option>
            <option value="1000 Wysp">Sos 1000 Wysp</option>
            <option value="Ketchup">Ketchup</option>
            <option value="Musztarda">Musztarda</option>
            <option value="Arabski">Sos Arabski</option>
            <option value="Amerykański">Sos Amerykański</option>
            <option value="BBQ">Sos BBQ</option>
            <option value="Czosnkowy">Sos Czosnkowy</option>
            <option value="Sriracha">Sos Sriracha</option>
            <option value="Serowy">Sos Serowy</option>
            <option value="Serowy Chilli">Sos Ser-Chilli</option>
            <option value="Sweet Chilli">Sos Sweet Chilli</option>
            <option value="Remoulada">Sos Remoulada</option>
            <option value="Musztarda-Miód">Sos Musztardowo-Miodowy</option>
            <option value="Jalapenio">Sos Jalapeno</option>
            <option value="Karolinka">Sos Karolinki</option>
        </select><br>

        <br><br><br><button type="submit">Wyślij Zamówienie</button>
        <button type="button" onclick="showOrders()">Pokaż Zamówienia</button>
        
    </form>


    <br><br><form id="deleteOrderForm" method="post" action="delete_order.php">
        <label for="orderIdToDelete">Wpisz numer zamówienia do usunięcia:</label>
        <input type="number" id="orderIdToDelete" name="orderIdToDelete" required>
        <button type="submit" onclick=deleteOrder()>Usuń Zamówienie</button>
    </form>


    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


    <script>
        function sendShit() {
            showToast('Pomyślnie wysłano zamówienie!', 'info');
            window.location.href = 'index.php'; // Zmień 'nowa_strona.html' na właściwą ścieżkę do nowej strony
            return false; // Zatrzymaj standardowe wysyłanie formularza
        }

        function showOrders() {
            showToast('Przejście do zamówień.', 'info');
            window.location.href = 'orders.php'; // Zmień 'nowa_strona.html' na właściwą ścieżkę do nowej strony
        }

        function deleteOrder() {
            showToast('Pomyślnie usunięto zamówienie!' , 'info');
        }


        // Funkcja do pokazywania toasta
        function showToast(message, type) {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                positionClass: 'toast-bottom-right',
                preventDuplicates: true,
                showDuration: 400,
                hideDuration: 1000,
                timeOut: 5000,
                extendedTimeOut: 1000,
                showEasing: 'swing',
                hideEasing: 'linear',
                showMethod: 'fadeIn',
                hideMethod: 'fadeOut'
            };

            toastr[type](message);
        }
    </script>

    
</body>
</html>
