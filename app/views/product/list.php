<h2>Les produits :</h2>
<div class="produits">
  <?php
  foreach ($tab_prod as $p) {
    $id = $p->get('product_id');
    $prix = $p->get('price');
    $product = htmlspecialchars($p);
    echo "<div>";
      echo " <a href='?a=read&c=product&id=$id' > " ;
        echo "<img src='{$p->getBlob()}'>";
        echo "<h2>$product</h2>";
        echo "<p>$prix €</p>";
      echo " </a>" ;
    echo " </div>" ;
  };
  ?>
</div>
