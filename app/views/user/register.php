<div id="popup2" class="overlay w-100">
  <div class="popup">
    <h2 style="text-align: center">Inscription</h2>
    <div class="content-popup">
      <form action="?a=registered&c=user" method="post">
        <div class="mb-3">
          <label for="lastname" class="form-label">Nom&nbsp;:</label>
          <input id="lastname" class="form-control" type="text" placeholder="Entrer votre nom de famille"
                 name="lastname"
                 required>
        </div>
        <div class="mb-3">
          <label for="firstname" class="form-label">Prénom&nbsp;:</label>
          <input id="firstname" class="form-control" type="text" placeholder="Entrer votre prénom" name="firstname"
                 required>
        </div>
        <div class="mb-3">
          <label for="username" class="form-label">Nom d'utilisateur&nbsp;:</label>
          <input id="username" class="form-control" type="text" placeholder="Entrer le nom d'utilisateur" name="username"
                 required>
        </div>

        <div class="mb-3">
          <label for="mail" class="form-label">Adresse email&nbsp;:</label>
          <input id="mail" class="form-control" type="email" placeholder="Entrer votre mail" name="mail" required>
          <label for="mail-conf" class="form-label"></label>
          <input id="mail-conf" class="form-control" type="email" placeholder="Confirmation de votre mail" name="mail-conf"
                 required>
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Mot de passe&nbsp;:</label>
          <input id="password" class="form-control" type="password" placeholder="Entrer le mot de passe" name="password"
                 required>
          <label for="password-conf" class="form-label"></label>
          <input id="password-conf" class="form-control" type="password" placeholder="Confirmation du mot de passe"
                 name="password-conf" required>
        </div>

        <input type="submit" class="btn btn-primary" value="Envoyer">
      </form>
    </div>
    <div class="d-flex justify-content-center"><a href="?a=login&c=user">Déjà inscrit&nbsp;?</a></div>
  </div>
</div>