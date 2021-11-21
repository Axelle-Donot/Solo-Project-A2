<?php
foreach ($tab_prod as $p) {
    echo "Les produits : ";
    $productName = htmlspecialchars($p->getName());
    echo "<p>Produit $productName</p>";
}
?>