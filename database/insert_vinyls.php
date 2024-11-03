<!-- <?php

// Połączenie z bazą danych
$cnn = new mysqli('localhost', 'root', '', 'sklep');  // Zmień 'sklep' na nazwę swojej bazy danych
if ($cnn->connect_error) {
    die("Błąd połączenia z bazą danych: " . $cnn->connect_error);
}

// Funkcja rekurencyjnego skanowania folderów
function scanMusicDirectory($dir, $cnn) {
    // Otwieramy folder
    if ($handle = opendir($dir)) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                // Sprawdzamy, czy element jest folderem
                if (is_dir($dir . '/' . $entry)) {
                    $folderName = $entry; // Nazwa folderu (nazwa zespołu)

                    // Skanowanie plików wewnątrz folderu
                    scanMusicDirectory($dir . '/' . $entry, $cnn);
                } else {
                    // To plik - wstawiamy dane do bazy
                    $fileInfo = pathinfo($entry);  // Pobieramy szczegóły o pliku
                    $fileName = $fileInfo['filename'];  // Nazwa pliku bez rozszerzenia
                    $folderName = basename(dirname($dir . '/' . $entry)); // Nazwa folderu (zespół)

                    // Zabezpieczenie danych przed SQL Injection
                    $folderNameSafe = $cnn->real_escape_string($folderName);
                    $fileNameSafe = $cnn->real_escape_string($fileName);

                    // Zapytanie INSERT do tabeli vinyls
                    $sql = "INSERT INTO vinyls (nazwa, zespol) VALUES ('$fileNameSafe', '$folderNameSafe')";
                    if ($cnn->query($sql) === TRUE) {
                        echo "Dodano rekord: $fileNameSafe (Zespół: $folderNameSafe)<br>";
                    } else {
                        echo "Błąd podczas dodawania rekordu: " . $cnn->error . "<br>";
                    }
                }
            }
        }
        closedir($handle);
    }
}

// Ścieżka do głównego katalogu z muzyką
$musicDirectory = 'assets/img/albums'; // Zmień na swoją ścieżkę folderu z plikami i zespołami
scanMusicDirectory($musicDirectory, $cnn);

// Zamykamy połączenie z bazą danych
$cnn->close();

?> -->
