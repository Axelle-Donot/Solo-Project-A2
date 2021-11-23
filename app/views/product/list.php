<h2>Les produits :</h2>
<ul>
  <?php
  foreach ($tab_prod as $p) {
    $product = htmlspecialchars($p);
    $img = $p->getBlob(); // Renvoie un tableau indexé par "type" et "blob"
    echo "<li>";
    echo "<img src='data:image/{$img['type']};base64, {$img['blob']}' alt='img du produit {$p->get('name')}'>";
    echo "<span>$product</span>";
    echo "</li>";
  }
  ?>
</ul>
