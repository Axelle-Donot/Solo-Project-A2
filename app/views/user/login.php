<div id="popup1" class="overlay w-100">
  <div class="popup">
    <h2 style="text-align: center">Connexion</h2>
    <div class="content-popup">
      <form action="?a=connected&c=user" method="post">
        <div class="mb-3">
          <label for="username-login" class="form-label">Nom d'utilisateur&nbsp;:</label>
          <input id="username-login" class="form-control" type="text"  name="username" placeholder="Jean-michel34"
                 required>
        </div>
        <div class="mb-3">
          <label for="password-login" class="form-label">Mot de passe&nbsp;:</label>
          <input id="password-login" class="form-control" type="password"  name="password" placeholder="********"
                 required>
        </div>
        <input type="submit" class="btn btn-primary" value="Login">
      </form>
    </div>
    <div class="d-flex justify-content-center"><a href="?a=register&c=user">Pas encore inscrit&nbsp;?</a></div>
  </div>
</div>