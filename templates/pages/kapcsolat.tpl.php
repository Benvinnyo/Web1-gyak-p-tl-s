
<h2>Kapcsolatfelvétel</h2>
<p>Írj nekünk üzenetet! A *-gal jelölt mezők kitöltése kötelező.</p>

<form id="kapcsolatForm" action="kapcsolatkuldes.php" method="POST" novalidate>
  <div class="mb-3">
    <label for="nev" class="form-label">Név *</label>
    <input type="text" class="form-control" id="nev" name="nev" required>
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email *</label>
    <input type="email" class="form-control" id="email" name="email" required>
  </div>
  <div class="mb-3">
    <label for="uzenet" class="form-label">Üzenet *</label>
    <textarea class="form-control" id="uzenet" name="uzenet" rows="4" required></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Küldés</button>
</form>

<script>
document.getElementById("kapcsolatForm").addEventListener("submit", function(event) {
  var nev = document.getElementById("nev").value.trim();
  var email = document.getElementById("email").value.trim();
  var uzenet = document.getElementById("uzenet").value.trim();
  if (!nev || !email || !uzenet || !email.includes('@')) {
    alert("Kérlek, minden mezőt helyesen tölts ki!");
    event.preventDefault();
  }
});
</script>
