<div class="d-flex justify-content-center align-items-center mb-4">
  <img width="64" src="<?= $user->getImage() ?>" alt="Image de profil de <?= htmlspecialchars($user->get('username')) ?>">
  <span class="m-2 fs-5 text-decoration-underline">Profil de <?= htmlspecialchars($user->get('username')) ?></span>
</div>

<p><strong>Pseudo&nbsp;:</strong> <?= htmlspecialchars($user->get('username')) ?></p>
<p><strong>Prénom, nom&nbsp;:</strong> <?= htmlspecialchars($user->get('first_name') . ' ' . $user->get('last_name')) ?>
</p>
<p><strong>Adresse e-mail&nbsp;:</strong> <?= htmlspecialchars($user->get('mail')) ?></p>
<p><strong>Numéro de téléphone&nbsp;:</strong> <?= htmlspecialchars($user->get('phone') ?? "Non défini") ?></p>
<p><strong>Adresse&nbsp;:</strong><br><?php
  $addr = $user->getAdresse();
  if ($addr != false)
    echo "Rue : " . htmlspecialchars($addr->get('street')) .
      "<br>Ville :" . htmlspecialchars($addr->get('city')) . ' (' . htmlspecialchars($addr->get('zip_code')) . ')' .
      "<br>Région :" . htmlspecialchars($addr->get('state')) .
      "<br>Pays :" . htmlspecialchars($addr->get('country'));
  else echo 'Non défini';
  ?>
</p>

<?php
$ordered = ModelOrdered_product::getAllItems(Session::getUserId());
foreach ($ordered as $order) {
  echo '<p>Commande n°' . htmlspecialchars($order['ordered_id']) . ' du '
    . htmlspecialchars($order['date']) . ' avec pour valeur ' . htmlspecialchars($order['total_price']) . '€';
}
?>
