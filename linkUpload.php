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

        $erlaubt = ['image/jpeg', 'image/jpg', 'image/gif', 'image/png'];
        if (in_array($_FILES['bild']['type'], $erlaubt)) {

            if(move_uploaded_file($_FILES['bild']['tmp_name'], $zielPfad)) {
                $sql = "INSERT INTO imagesLink VALUES (?, ?)";
                $stmt = $pdo->prepare($sql);
                $stmt->execute([$originalName, $zielPfad]);

                echo "Bild erfolgreich hochgeladen!";
            }
            else {
                echo "Fehler beim verschieben der Datei";
            }
        } else {
            echo "Nur JPG, PNG und GIF erlaubt!";
        }
    }
    ?>
</body>
</html>