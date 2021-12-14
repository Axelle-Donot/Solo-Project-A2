<h2>Contenu de votre panier&nbsp;:</h2>
<?php if (!Session::isConnected() && empty(Session::getCartItems())) { ?>
  <div>Votre panier est vide c'est bien dommage, un petit tour en <a href="?a=readAll&c=product">Boutique</a>&nbsp;?
  </div>
<?php } else if (Session::isConnected() && ModelCart_item::emptyCart(ModelUser::getCartIdByUserId(Session::getUserId())) == 0) { ?>
  <div>Votre panier est vide c'est bien dommage, un petit tour en <a href="?a=readAll&c=product">Boutique</a>&nbsp;?
  </div>
<?php } else { ?>
  <div>
    <?php
    $total_price = 0;
    $number_items = 0;
    foreach ($tab_items as $item) {
      $p = ModelProduct::select($item['product_id']);
      $q = $item['quantity'];
      $number_items += 1;
      $total_price += $p->getPrixEffectif() * (int)$q ?>
      <div class="d-flex my-3">
        <img class="w-25 rounded" src="<?= $p->getImage() ?>"
             alt="Image du produit <?= htmlspecialchars($p->get('name')) ?>"/>
        <div class="d-flex flex-column my-auto" style="margin-left: 1rem;">
          <span class="fw-bold fs-3"><?= htmlspecialchars($p->get('name')) ?></span>
          <span class="fw-bold"><?= htmlspecialchars($p->getPrixEffectif()) ?>€/u</span>
          <span>Quantité&nbsp;: <?= htmlspecialchars($q) ?></span>
          <a class="btn btn-success my-1" href="?a=add&c=cart&id=<?= urlencode($item['product_id']) ?>"><i class="fas fa-plus"></i></a>
          <a class="btn btn-danger my-1" href="?a=delete&c=cart&id=<?= urlencode($item['product_id']) ?>"><i class="fas fa-minus"></i></a>
        </div>
      </div>
    <?php }
    ?>
    <h4 class="my-4">Prix total&nbsp;: <?= htmlspecialchars($total_price) ?>€</h4>
    <h4 class="my-4">Nombres d'articles : <?= htmlspecialchars($number_items) ?></h4>
  </div>
  <div>
    <a class="btn btn-info" href="?a=pay&c=payment">Passer commande</a>
  </div>

<?php } ?>


