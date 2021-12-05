<div class="d-flex justify-content-center align-items-center mb-4">
  <img src="<?= $user->getImage() ?>" alt="Image de profil de <?= $user->get('username') ?>">
  <span class="m-2 fs-5 text-decoration-underline">Profil de <?= $user->get('username') ?></span>
</div>

<p><strong>Pseudo&nbsp;:</strong> <?= $user->get('username') ?></p>
<p><strong>Prénom, nom&nbsp;:</strong> <?= $user->get('first_name') . ' ' . $user->get('last_name') ?></p>
<p><strong>Adresse e-mail&nbsp;:</strong> <?= $user->get('mail') ?></p>
<p><strong>Numéro de téléphone&nbsp;:</strong> <?= $user->get('phone') ?? "Non défini" ?></p>
<p><strong>Adresse&nbsp;:</strong> <?= $user->getAdresse() ?? "Non définie" ?></p>
