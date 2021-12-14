<?php if (Session::isAdmin()) { ?>
  <a class="btn btn-success" href="?a=create&c=product"><i class="fas fa-plus"></i></a>
  <a class="btn btn-info" href="?a=update&c=product&id=<?= urlencode($value->get("product_id")) ?>"><i class="fas fa-pen"></i></a>
  <a class="btn btn-danger" href="?a=delete&c=product&id=<?= urlencode($value->get("product_id")) ?>"><i class="fas fa-trash"></i></a>
<?php } ?>
<div class="detail">
  <h2>Produit <?= htmlspecialchars($value->get("name")) ?></h2>
  <img src="<?= $value->getImage() ?>" class="rounded" alt="img du produit <?= htmlspecialchars($value->get("name")) ?>"/>
  <h5 class="align-self-start">Description&nbsp;:</h5>
  <p><?= htmlspecialchars($value->get("description")) ?></p>
  <h5 class="align-self-start">Prix&nbsp;: <?php
    echo htmlspecialchars($value->getPrixEffectif()) . '€';
    if ($value->hasDiscount())
      echo '&nbsp;&nbsp;&nbsp;&nbsp;<del>' . htmlspecialchars($value->get('price')) . '€</del>';
    ?></h5>
  <a class="btn btn-outline-info" href="?a=add&c=cart&id=<?= urlencode($value->get("product_id")) ?>">Ajouter au panier</a>
</div>

