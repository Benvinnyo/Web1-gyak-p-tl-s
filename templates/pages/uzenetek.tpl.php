<h2>Üzenetek megtekintése</h2>
<table class="table table-bordered table-striped">
  <thead class="table-dark">
    <tr>
      <th>#</th>
      <th>Név</th>
      <th>Email</th>
      <th>Üzenet</th>
    </tr>
  </thead>
  <tbody>
  <?php
    try {
      $dbh = new PDO('mysql:host=localhost;dbname=airsoft', 'airsoft', 'Sajtoskifli18', array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
      $stmt = $dbh->query("SELECT id, nev, email, uzenet FROM uzenetek ORDER BY id ASC");
      foreach ($stmt as $row) {
        echo "<tr><td>{$row['id']}</td><td>{$row['nev']}</td><td>{$row['email']}</td><td>{$row['uzenet']}</td></tr>";
      }
    } catch (PDOException $e) {
      echo "<tr><td colspan='4'>Adatbázishiba: " . $e->getMessage() . "</td></tr>";
    }
  ?>
  </tbody>
</table>