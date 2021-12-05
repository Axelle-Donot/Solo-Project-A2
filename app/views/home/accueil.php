<div class="accueil">
  <?php
  $p = ModelProduct::select(2);
  $id = $p->get('product_id');
  $product = htmlspecialchars($p);

  //$idreduction = ModelDiscount::getReductionById($p->get('discount_id'));
  //echo $idreduction;
  echo "<h1>BLACK FRIDAY !!!</h1>";
  echo "<a href='?a=read&c=product&id=$id' > ";
  echo "<img src='{$p->getImage()}'>";
  echo "<p>-50%</p>";
  echo "</a>";
  ?>
</div>


