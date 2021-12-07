<h2>Les produits :</h2>
<div class="produits">
  <?php
  foreach ($tab_prod as $p) {
    $id = urlencode($p->get('product_id'));
    $prix = $p->get('price');
    $product = htmlspecialchars($p); ?>
    <div class="rounded">
      <a href="?a=read&c=product&id=<?= $id ?>">
        <img src="<?= $p->getImage() ?>" alt="" />
        <h2><?= $product ?></h2>
        <p><?= $prix ?>€</p>
        <a class="btn btn-outline-info my-2" href="?a=add&c=cart&id=<?= urlencode($id) ?>">Ajouter au panier</a>
      </a>
    </div>
  <?php } ?>
</div>
