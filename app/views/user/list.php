<h2>Les utilisateurs :</h2>
<ul>
  <?php
  foreach ($tab_user as $u) {
    $user = htmlspecialchars($u);
    echo "<li>$user</li>";
  }
  ?>
</ul>
