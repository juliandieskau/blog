<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $name = $_POST["Vorname"];
    echo "<h1>Hallo $name</h1>";
    echo "Deine Mail: ".$_POST["eMail"];
    ?>
</body>
</html>

