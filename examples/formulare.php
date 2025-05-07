<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form method="post">
        <input type="text" name="Vorname" placeholder="Vorname">
        <input type="eMail" name="eMail" placeholder="eMail">
        <input type="submit">
    </form>

    <?php
    if(isset($_POST["Vorname"])){
        $name = $_POST["Vorname"];
        echo "<h1>Hallo $name</h1>";
        echo "Deine Mail: ".$_POST["eMail"];
    }

    ?>

    <?php
    //kommentar
    echo "<h1>Überschrift</h1>";
    echo "<hr>";
    $name = "Kauan";
    $ausgabe = "Hallo ".$name;
    echo "<p>".$ausgabe."</p>";
    $zahl = 5;
    $zahl2 =  $zahl + 60;
    

    if($zahl2 < 10){
        echo $zahl2;
    } else{
       echo "Zahl nicht kleiner 10" ;
    }

    ?>
    <br>
    <p>Hallo hier ist text <?php echo $name ?></p>
</body>
</html>