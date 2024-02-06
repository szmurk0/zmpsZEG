# zmpsZEG
Zmodernizowanie Metod Pracy Sklepiku Zegowskiego

System obejmuje różne strony do składania zamówień, zarządzania zamówieniami w kuchni oraz przeglądania listy zamówień.

# Pliki
## 1. index.php
Ten plik reprezentuje główną stronę zamawiania, na której użytkownicy mogą składać zamówienia na HotDoga. Zawiera formularz do wyboru typu HotDoga, sosów i złożenia zamówienia.

## 2. kitchen.php
Strona kuchni wyświetla bieżące zamówienia, które są w trakcie przygotowywania. Zawiera dwie kolumny dla zamówień w przygotowaniu i zrealizowanych zamówień. Strona automatycznie odświeża się co 15 sekund.

## 3. order.php
Ten plik wyświetla listę zamówień, które są obecnie w trakcie przygotowywania. Zawiera informacje o każdym zamówieniu, takie jak typ HotDoga, sosy i formularz do zmiany statusu zamówienia na "Gotowy".

## 4. process_order.php
Po złożeniu zamówienia na stronie index.php ten plik przetwarza zamówienie, aktualizuje bazę danych i przekierowuje użytkownika na stronę główną.

## 5. change_status.php
Ten plik obsługuje zmianę statusu zamówienia z "W przygotowaniu" na "Gotowy", gdy personel kuchni oznacza zamówienie jako zrealizowane.

## 6. delete_order.php
Obsługuje usuwanie zamówienia na podstawie identyfikatora zamówienia podanego przez użytkownika.

## 7. fetch_orders.php
Skrypt PHP pobierający i wyświetlający zamówienia na podstawie ich statusu. Jest używany do dynamicznego ładowania treści bez konieczności odświeżania strony.

## Arkusze stylów
styleIndex.css: Style dla strony index.php.
styleKitchen.css: Style dla strony kitchen.php.
styleOrders.css: Style dla strony order.php.

## Inne technologie
Bootstrap: Wersja 4.5.2
Animate.css: Wersja 4.1.1
Toastr: Wersja 2.1.4
