<?php $artikelnummer = $_GET['artikelnummer']; ?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product.php</title>
</head>
<body>
    <p>Die gesuchte Artikelnummer ist: 
        
        <?php echo $artikelnummer;        ?>

    </p>
    <br>
    <a href="produktseite.php">Zurück zur Produktauswahl</a>
</body>
</html>