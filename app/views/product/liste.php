<?php foreach ($tab_prod as $p): ?>
    <p> Produit <?= htmlspecialchars($p->getName()) ?></p>
<?php endforeach; ?>


<?php 
    foreach ($tab_prod as $p){
        echo "Liste des produits";
        <p> Produit <?= htmlspecialchars($p->getName()) ?></p>
    }
?>    