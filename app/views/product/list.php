<h2>Les produits :</h2>
<ul>
  <?php
  foreach ($tab_prod as $p) {
    $product = htmlspecialchars($p);
    echo "<li>$product</li>";
  }
  ?>
</ul>
