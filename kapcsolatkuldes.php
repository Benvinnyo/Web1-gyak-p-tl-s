<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nev = trim($_POST["nev"]);
    $email = trim($_POST["email"]);
    $uzenet = trim($_POST["uzenet"]);

    $hibak = [];
    if (empty($nev)) $hibak[] = "A név mező kitöltése kötelező.";
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) $hibak[] = "Érvényes e-mail cím szükséges.";
    if (empty($uzenet)) $hibak[] = "Az üzenet mező nem lehet üres.";

    if (count($hibak) === 0) {
        try {
            $dbh = new PDO('mysql:host=localhost;dbname=airsoft', 'airsoft', 'Sajtoskifli18', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
            $stmt = $dbh->prepare("INSERT INTO uzenetek (nev, email, uzenet) VALUES (?, ?, ?)");
            $stmt->execute([$nev, $email, $uzenet]);
            echo "<h2>Köszönjük az üzenetet!</h2>";
            echo "<p><strong>Név:</strong> " . htmlspecialchars($nev) . "</p>";
            echo "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>";
            echo "<p><strong>Üzenet:</strong><br>" . nl2br(htmlspecialchars($uzenet)) . "</p>";
        } catch (PDOException $e) {
            echo "Adatbázis hiba: " . $e->getMessage();
        }
    } else {
        echo "<h2>Hiba történt!</h2><ul>";
        foreach ($hibak as $hiba) echo "<li>" . htmlspecialchars($hiba) . "</li>";
        echo "</ul>";
    }
}
?>
