<?php
if (isset($_POST['login']) && isset($_POST['jelszo'])) {
    try {
        $dbh = new PDO('mysql:host=localhost;dbname=airsoft', 'airsoft', 'Sajtoskifli18', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        $dbh->query('SET NAMES utf8mb4');

        $sql = "SELECT id, csaladi_nev, uto_nev FROM felhasznalok 
                WHERE bejelentkezes = :login AND jelszo = :jelszo";
        $sth = $dbh->prepare($sql);
        $sth->execute(array(":login" => $_POST['login'], ":jelszo" => $_POST['jelszo']));
        
        if ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];
            $_SESSION["csaladi_nev"] = $row["csaladi_nev"];
            $_SESSION["uto_nev"] = $row["uto_nev"];
        } else {
            $errormessage = "Hibás bejelentkezési adatok!";
        }
    } catch (PDOException $e) {
        $errormessage = "Adatbázis hiba: " . $e->getMessage();
    }
}
?>
