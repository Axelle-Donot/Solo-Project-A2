<?php if (Session::isAdmin()) { ?>
  <a class="btn btn-success mb-3" href="?a=create&c=product">Créer un produit</a>
<?php } ?>
<div class="produits">
  <?php
  foreach ($tab_prod as $p) {
    $id = urlencode($p->get('product_id')); ?>
    <div class="rounded">
      <a href="?a=read&c=product&id=<?= $id ?>">
        <img src="<?= $p->getImage() ?>" alt="" />
        <h2><?= htmlspecialchars($p) ?></h2>
        <p><?php
          echo htmlspecialchars($p->getPrixEffectif()) . '€';
          if ($p->hasDiscount())
            echo '&nbsp;&nbsp;&nbsp;&nbsp;<del>' . htmlspecialchars($p->get('price')) . '€</del>';
          ?></p>
        <a class="btn btn-outline-info mb-3" href="?a=add&c=cart&id=<?= urlencode($id) ?>">Ajouter au panier</a>
      </a>
    </div>
  <?php } ?>
</div>
