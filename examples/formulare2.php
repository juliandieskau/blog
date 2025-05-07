<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(isset($_GET["id"])){
            if($_GET["id"] == 2335){
                echo "<p>Nutzer ist bekannt</p>";
            } else{
                echo "<p>Nutzer ist unbekannt</p>";
            }
        }
        if(isset($_GET["sprache"])){
            if($_GET["sprache"] != "deutsch"){
                echo "<p>Welcome to my Website</p>";
            } else{
                echo "<p>Willkommen auf meiner Website</p>";
            }
        }
    ?>

    <form method="get">
        <input type="text" name="id" placeholder="id">
        <input type="text" name="sprache" placeholder="Sprache">
        <input type="submit">
    </form>
</body>
</html>