<h2>Üzenetküldés visszajelzés</h2>

<?php if (isset($_SESSION['uzenet_statusz'])): ?>
    <p><strong><?= $_SESSION['uzenet_statusz'] ?></strong></p>
    <?php unset($_SESSION['uzenet_statusz']); ?>
<?php else: ?>
    <p>Nem érkezett visszajelzés.</p>
<?php endif; ?>

<p><a href="kapcsolat">Vissza a kapcsolat oldalra</a></p>
