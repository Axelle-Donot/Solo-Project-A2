<h2>Contenu de votre panier&nbsp;:</h2>
<?php if (empty(Session::getCartItems())) { ?>
<div>Votre panier est vide c'est bien dommage, un petit tour en <a href="?a=readAll&c=product">Boutique</a>&nbsp;?</div>
<?php } else { ?>
  <div>
    <?php
    $total_price = 0;
    foreach ($tab_items as $item) {
      $p = ModelProduct::select($item['product_id']);
      $q = htmlspecialchars($item['quantity']);
      $total_price += $p->get('price') * (int)$q ?>
      <div class="d-flex my-3">
        <img class="w-25 rounded" src="<?= $p->getImage() ?>" alt="Image du produit <?= htmlspecialchars($p->get('name')) ?>"/>
        <div class="d-flex flex-column my-auto" style="margin-left: 1rem;">
          <span class="fw-bold fs-3"><?= htmlspecialchars($p->get('name')) ?></span>
          <span class="fw-bold"><?= htmlspecialchars($p->get('price')) ?>€/u</span>
          <span>Quantité&nbsp;: <?= $q ?></span>
          <a class="btn btn-danger my-1" href="?a=delete&c=cart&id=<?= urlencode($item['product_id']) ?>">Supprimer
            (unité)</a>
        </div>
      </div>
    <?php }
    // Pour plus tard
    // echo "<a href='?a=pay&c=cart&id=$id'>Payer</a>";
    ?>
    <h4 class="my-4"> Prix total&nbsp;: <?= $total_price ?>€</h4>
  </div>
<?php } ?>
