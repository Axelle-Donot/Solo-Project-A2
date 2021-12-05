<div id="popup1" class="overlay w-100">
  <div class="popup">
    <h2 style="text-align: center">Connexion</h2>
    <div class="content-popup">
      <form action="?a=connected&c=user" method="post">
        <div class="mb-3">
          <label for="mail" class="form-label">Adresse e-mail&nbsp;:</label>
          <input id="mail" class="form-control" type="text" name="mail-login" placeholder="jean-michel34@example.com"
                 required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Mot de passe&nbsp;:</label>
          <input id="password" class="form-control" type="password" name="password-login" placeholder="********"
                 required>
        </div>
        <input type="submit" class="btn btn-primary" value="Login">
      </form>
    </div>
    <div class="d-flex justify-content-center"><a href="?a=register&c=user">Pas encore inscrit&nbsp;?</a></div>
  </div>
</div>