<?php

if (isset($_POST['felhasznalo']) && isset($_POST['jelszo'])) {
    try {
        // Kapcsolódás
        $dbh = new PDO(
            'mysql:host=localhost;dbname=airsoft',
            'root',
            '',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
        );
        $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');

        // Felhasználó keresése
        $sqlSelect = "SELECT id, csaladi_nev, uto_nev FROM felhasznalok 
                      WHERE bejelentkezes = :bejelentkezes AND jelszo = SHA1(:jelszo)";
        $sth = $dbh->prepare($sqlSelect);
        $sth->execute(array(
            ':bejelentkezes' => $_POST['felhasznalo'],
            ':jelszo' => $_POST['jelszo']
        ));

        $row = $sth->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            // Sikeres bejelentkezés
            $_SESSION['csn'] = $row['csaladi_nev'];
            $_SESSION['un'] = $row['uto_nev'];
            $_SESSION['user'] = $_POST['felhasznalo'];
            $_SESSION['login'] = true;  // <-- FONTOS: ez így működik a menü feltételével
        }
    } catch (PDOException $e) {
        $errormessage = "Hiba: " . $e->getMessage();
    }
} else {
    header("Location: .");
    exit();
}
?>
