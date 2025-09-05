<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Link Upload</title>
    <?php
    include "connection.php";
    ?>
</head>
<body>
    <form action="linkUpload.php" method="post" enctype="multipart/form-data">
        <input type="file" name="bild" required>
        <button type="submit">Bild hochladen</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['bild'])) {
        $uploadOrdner = 'uploads/';
        $originalName = basename($_FILES['bild']['name']);
        $zeitstempelName = time() . "_" . $originalName;
        $zielPfad = $uploadOrdner . $zeitstempelName;

        
    }
    ?>
</body>
</html>