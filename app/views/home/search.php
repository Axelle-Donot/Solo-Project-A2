<h2 class="text-center">Recherche pour "<?= htmlspecialchars($_GET['q']) ?>"</h2>

<div class="border border-dark rounded mb-4">
  <h3 class="m-3">Produits&nbsp;:</h3>
  <?php if (empty($tab_prod)) { ?>
    <div class="m-3">Aucun résultat pour "<?= htmlspecialchars($_GET['q']) ?>"</div>
  <?php } else { ?>
    <div class="m-3 d-flex gap-3 flex-wrap">
      <?php foreach ($tab_prod as $prod) {
        $id = urlencode($prod->get('product_id'));
        $name = htmlspecialchars($prod->get('name'));
        echo "<div class='p-3 card text-decoration-none text-black d-flex flex-column gap-2'  style='width: 15rem;' href='?a=read&c=product&id=$id'>";
        echo "<img src='{$prod->getImage()}' class='card-img-top' alt='Image du produit $name' />";
        echo "<div class='d-flex flex-column justify-content-center'>";
        echo "<h5 class='text-center'>$name</h5>";
        echo "<a href='?a=read&c=product&id=$id' class='btn btn-info'>Plus d'infos</a>";
        echo "</div>";
        echo "</div>";
      } ?>
    </div>
  <?php } ?>
</div>

<div class="border border-dark rounded">
  <h3 class="m-3">Utilisateurs&nbsp;:</h3>
  <?php if (empty($tab_user)) { ?>
    <div class="m-3">Aucun résultat pour "<?= htmlspecialchars($_GET['q']) ?>"</div>
  <?php } else { ?>
    <div class="m-3 d-flex gap-3 flex-wrap">
      <?php foreach ($tab_user as $user) {
        $id = urlencode($user->get('user_id'));
        $name = htmlspecialchars($user->get('first_name') . ' ' . $user->get('last_name'));
        echo "<div class='p-3 card text-decoration-none text-black d-flex flex-column gap-2'  style='width: 15rem;' href='?a=read&c=user&id=$id'>";
        echo "<img src='{$user->getImage()}' class='card-img-top' alt='Image du produit $name' />";
        echo "<div class='d-flex flex-column justify-content-center'>";
        echo "<h5 class='text-center'>$name</h5>";
        echo "<a href='?a=read&c=product&id=$id' class='btn btn-info'>Plus d'infos</a>";
        echo "</div>";
        echo "</div>";
      } ?>
    </div>
  <?php } ?>
</div>