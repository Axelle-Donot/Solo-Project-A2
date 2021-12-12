<div class="detail">
  <h2>Produit <?= $value->get("name") ?></h2>
  <div><img src="<?= $value->getImage() ?>" alt="img du produit <?= $value->get("name") ?>"></div>
  <p>Description <?= $value->get("description") ?></p>
  <p>Prix <?= $value->get("price") ?>€</p>
  <?php $id = $value->get("product_id"); ?>
  <a class="btn btn-outline-info" href="?a=add&c=cart&id=<?= urlencode($id) ?>">Ajouter au panier</a>
</div>

<?php //echo ModelCart_item::totalPrice(ModelUser::getCartIdByUserId(Session::getUserId())); ?>