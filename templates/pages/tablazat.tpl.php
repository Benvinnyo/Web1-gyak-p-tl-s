
<h2>Airsoft Fantáziafegyverek</h2>
<table class="table table-bordered table-striped">
  <thead class="table-dark">
    <tr>
      <th>Név</th>
      <th>Típus</th>
      <th>Tűzerő</th>
      <th>Hatótáv (m)</th>
    </tr>
  </thead>
  <tbody>
  <?php
    try {
      $dbh = new PDO('mysql:host=localhost;dbname=airsoft', 'airsoft', 'Sajtoskifli18', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
      $stmt = $dbh->query("SELECT nev, tipus, tuzero, hatotav FROM fegyverek ORDER BY tuzero DESC");
      foreach ($stmt as $row) {
        echo "<tr><td>{$row['nev']}</td><td>{$row['tipus']}</td><td>{$row['tuzero']}</td><td>{$row['hatotav']}</td></tr>";
      }
    } catch (PDOException $e) {
      echo "<tr><td colspan='4'>Adatbázishiba: " . $e->getMessage() . "</td></tr>";
    }
  ?>
  </tbody>
</table>
