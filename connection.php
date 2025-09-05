<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection</title>
</head>
<body>
    <?php
$host = '127.0.0.1';
$port = 3324;
$dbname = '2342_bilddatenbank';
$username = 'root';
$password = '1234';

try {
    $dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8mb4";
    $pdo = new PDO($dsn, $username, $password);

    // Fehlerbehandlung aktivieren
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    echo "Verbindung fehlgeschlagen: " . $e->getMessage();
}

?>
</body>
</html>