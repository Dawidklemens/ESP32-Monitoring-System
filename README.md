# System Monitorowania ESP32

## Opis projektu
Projekt realizuje system zbierania i wizualizacji danych z czujników połączonych z ESP32. System składa się z modułu zapisu danych (PHP), bazy danych MySQL oraz webowego dashboardu wyświetlającego parametry w czasie rzeczywistym.

## Struktura plików
* `select.php` - API zwracające ostatnie pomiary w formacie JSON.
* `write_data.php` - skrypt odbierający dane z czujnika ESP32 i zapisujący je do bazy.
* `dashboard.html` - główny dashboard dla użytkownika, pobierający dane co 3 sekundy.
* `config.php` - konfiguracja połączenia z bazą `iot_esp32_db`.

## Technologie
* Backend: PHP, MySQL
* Frontend: HTML5, CSS, JavaScript (Fetch API)
* Komunikacja: HTTP/JSON

## Instrukcja uruchomienia
1. Upewnij się, że posiadasz środowisko XAMPP.
2. Zaimportuj strukturę bazy danych `iot_esp32_db` do phpMyAdmin.
3. Skopiuj pliki PHP do folderu `htdocs` w katalogu instalacyjnym XAMPP.
4. Uruchom Apache i MySQL w panelu XAMPP.
5. Otwórz `dashboard.html` w przeglądarce, aby monitorować odczyty.
