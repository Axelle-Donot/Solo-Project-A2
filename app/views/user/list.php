<h2>Les utilisateurs :</h2>
<div class="produits">
  <?php
  foreach ($tab_user as $u) {
    $id = urlencode($u->get('user_id'));
    $name = htmlspecialchars($u->get('first_name') . ' ' . $u->get('last_name'));
    $username = htmlspecialchars($u->get('username')); ?>
    <div class="rounded">
      <a href="?a=read&c=user&id=<?= $id ?>">
        <img width="64" src="<?= $u->getImage() ?>" alt="Image du compte de <?= $name ?>" />
        <p><?= $name ?></p>
        <p><?= $username ?></p>
      </a>
    </div>
  <?php } ?>
</div>
