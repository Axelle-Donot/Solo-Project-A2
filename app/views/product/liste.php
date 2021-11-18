<?php foreach ($tab_prod as $p): ?>
    <p>Produit <?= htmlspecialchars($p->getName()) ?></p>
<?php endforeach; ?>