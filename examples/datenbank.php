<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $servername = "localhost";
        $username = "root"; //Admin
        $password = ""; //Admin-Passwort leer

        //Verbindung zum DB-Server herstellen (Connection-Object)
        $conn = new mysqli($servername, $username, $password);

        //Verbindung überprüfen
        if($conn->connect_error){
            die("Verbindung fehlgeschlagen: ".$conn->connect_error); //Exit + Fehlermeldung
        }
        echo "Verbindung erfolgreich<br>";

        //Datenbank erstellen
        $sql = "CREATE DATABASE IF NOT EXISTS blogdb";
        if($conn->query($sql)===TRUE){
            echo "Datenbank wurde erfolgreich erstellt<br>";
        } else{
            echo "Fehler beim Erstellen der Datenbank". $conn->error. "<br>";
        }

        // Wähle die eben erstelle Datenbank aus
        $conn->select_db("blogdb");

        // Tabelle erstellen
        $sql = "CREATE TABLE IF NOT EXISTS Kontakt(
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        vorname VARCHAR(30) NOT NULL,
        nachname VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        telefonnummer VARCHAR(15),
        adresse VARCHAR(100),
        registrierungsdatum TIMESTAMP
        )";

        if($conn->query($sql)){
            echo "Tabelle erfolgreich erstellt<br>";
        } else{
            echo "Fehler beim Erstellen der Tabelle". $conn->error . "<br>";
        }

        //Daten aus HTML-Formular einfügen
        if($_SERVER["REQUEST_METHOD"] == "POST"
        && isset($_POST["action"])
        && $_POST["action"]== "insert"){

            $vorname = $_POST["vorname"];
            $nachname = $_POST["nachname"];
            $email = $_POST["email"];
            $telefonnummer = $_POST["telefonnummer"];
            $adresse = $_POST["adresse"];

            $sql = "INSERT INTO Kontakt (vorname, nachname, email, telefonnummer, adresse)
            VALUES ('$vorname','$nachname','$email','$telefonnummer','$adresse' )" ;

            if($conn->query($sql)){
                echo "Neuer Datensatz erfolgreich eingefügt<br>";
            } else{
                echo "Fehler beim Einfügen des Datensatzes". $conn->error."<br>";
            }
        }

        if($_SERVER["REQUEST_METHOD"] == "POST"
        && isset($_POST["action"])
        && $_POST["action"]== "delete"){

            $id = $_POST["id"];

            $sql = "DELETE FROM Kontakt WHERE id = $id";

            if($conn->query($sql)){
                echo "Datensatz erfolgreich gelöscht<br>";
            } else{
                echo "Fehler beim Löschen des Datensatzes".$conn->error."<br>";
            }

        }

        //Anzeigen der Daten
        $sql = "SELECT id, vorname, nachname, email, telefonnummer, adresse FROM Kontakt";
        $ausgabe = $conn->query($sql);

        if($ausgabe->num_rows>0){
            echo "<table>
            <tr>
            <th>ID</th><th>Vorname</th><th>Nachname</th>
            <th>E-Mail</th><th>Telefonnummer</th><th>Adresse</th>
            </tr>
            ";
            
            //Ausgabe jeder Zeile
            while($row = $ausgabe->fetch_assoc()){
                echo "<tr>
                <td>".$row["id"]."</td> <td>".$row["vorname"]."</td> <td>".$row["nachname"]."</td>
                <td>".$row["email"]."</td> <td>".$row["telefonnummer"]."</td> <td>".$row["adresse"]."</td>
                ";

                echo "<td><form method='post' action=''>
                <input type='hidden' name='id' value='".$row["id"]."'>
                <input type='hidden' name='action' value='delete'>
                <button type='submit'>Löschen</button>
                </form></td></tr>";
            }
            echo "</table>";
        } else{
            echo "0 Ergebnisse <br>";
        }

        //Verbindung zur Datenbank schließen
        $conn->close()
    ?>

    <h2>Neuen Datensatz hinzufügen</h2>
    <form method="post" action="">
        <input type="hidden" name="action" value="insert">
        <label for="vorname">Vorname:</label>
        <input type="text" id="vorname" name="vorname" required>
        <label for="nachname">Nachname:</label>
        <input type="text" id="nachname" name="nachname" required>
        <label for="email">E-Mail:</label>
        <input type="email" id="email" name="email" required>
        <label for="telefonnummer">Telefonnummer:</label>
        <input type="text" id="telefonnummer" name="telefonnummer" required>
        <label for="adresse">Adresse:</label>
        <input type="text" id="adresse" name="adresse" required>
        <button type="submit">Hinzufügen</button>
    </form>

</body>
</html>