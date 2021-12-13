<div class="w-75 m-auto">
  <h2 style="text-align: center">Inscription</h2>
  <div class="content-popup">
    <form action="?a=registered&c=user" method="post">
      <div class="mb-3">
        <label for="lastname" class="form-label">Nom&nbsp;:</label>
        <input id="lastname" class="form-control" type="text" placeholder="Entrer votre nom de famille" name="lastname"
               required>
      </div>
      <div class="mb-3">
        <label for="firstname" class="form-label">Prénom&nbsp;:</label>
        <input id="firstname" class="form-control" type="text" placeholder="Entrer votre prénom" name="firstname"
               required>
      </div>
      <div class="mb-3">
        <label for="user" class="form-label">Nom d'utilisateur&nbsp;:</label>
        <input id="user" class="form-control" type="text" placeholder="Entrer le nom d'utilisateur" name="username"
               required>
      </div>
       <div class="mb-3">
        <label for="phone" class="form-label">Téléphone&nbsp;:</label>
        <input id="phone" class="form-control" type="text" placeholder="ton 06" name="phone"
               required>
      </div>

      <div class="mb-3">
        <label for="mm" class="form-label">Adresse email&nbsp;:</label>
        <input id="mm" class="form-control" type="email" placeholder="Entrer votre mail" name="mail" required>
        <label for="mm2" class="form-label"></label>
        <input id="mm2" class="form-control" type="email" placeholder="Confirmation de votre mail" name="mail"
               required>
      </div>

      <div class="mb-3">
        <label for="pass" class="form-label">Mot de passe&nbsp;:</label>
        <input id="pass" class="form-control" type="password" placeholder="Entrer le mot de passe" name="password"
               required>
        <label for="pass2" class="form-label"></label>
        <input id="pass2" class="form-control" type="password" placeholder="Confirmation du mot de passe"
               name="password"
               required>
      </div>

      <input type="submit" class="btn btn-primary" value="Envoyer">
    </form>
  </div>
  <div style="text-align: center"><a href="?a=login&c=user">Déjà inscrit&nbsp;?</a></div>
</div>