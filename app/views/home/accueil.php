<div class="accueil">
  <?php
  $p = ModelProduct::select(2);
  $id = urlencode($p->get('product_id'));
  $product = htmlspecialchars($p);

  echo "<h1>BLACK FRIDAY&nbsp;!!!</h1>";
  echo "<a href='?a=read&c=product&id=$id' > ";
  echo "<img src='{$p->getImage()}' alt='Image du produit $product'>";
  echo "<p>-50%</p>";
  echo "</a>";
  ?>
</div>
