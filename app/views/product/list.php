<h2>Les produits :</h2>
<ul>
  <?php
  foreach ($tab_prod as $p) {
    $product = htmlspecialchars($p);
    echo "<li>";
    echo "<img src='{$p->getBlob()}'>";
    echo "<h2>$product</h2>";
    echo "</li>";
  }
  ?>
</ul>
