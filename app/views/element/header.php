<?php $url_root = Conf::getUrlRoot() ?>

<header id="default">
  <div class="header-top">
    <div class="left-header-top">
      <a href="<?= $url_root ?>">
        <img class="banner-logo" src="assets/img/Banner_Solo.png" alt="Bannière du site : Solo - The way of the saber">
      </a>
    </div>
    <div class="right-header-top">
      <div class="account">
        <div class="login">
          <i class="fas fa-user"></i>
          <a href="#popup1" class="login-a">Se connecter</a>
        </div>

        <div id="popup1" class="overlay">
          <div class="popup">
            <h2>Connexion</h2>
            <a class="close" href="#">×</a>
            <div class="content-popup">
              <form action="#" method="get">
                <label for="username-login">Nom d'utilisateur&nbsp;:</label>
                <input type="text" id="username-login" name="username" placeholder="Entrer le nom d'utilisateur"
                       required="">
                <label for="password-login">Mot de passe&nbsp;:</label>
                <input type="password" id="password-login" name="password" placeholder="Entrer le mot de passe"
                       required="">
                <input type="submit" class="link-button" id="submit-login" value="Login">
              </form>
            </div>
            <p><a href="#popup2">Pas encore inscrit&nbsp;? S'inscrire</a></p>
          </div>
        </div>

        <span>|</span>
        <div class="register">
          <a href="#popup2">S'inscrire</a>
        </div>
        <div id="popup2" class="overlay">
          <div class="popup">
            <h2>Inscription</h2>
            <a class="close" href="#">×</a>
            <div class="content-popup">
              <form action="#" method="get">
                <label for="user">Nom d'utilisateur&nbsp;:</label>
                <input id="user" type="text" placeholder="Entrer le nom d'utilisateur" name="username" required="">

                <label for="mm">Adresse email&nbsp;:</label>
                <input id="mm" type="email" placeholder="Entrer votre mail" name="mail" required="">
                <label for="mm2"></label>
                <input id="mm2" type="email" placeholder="Confirmation de votre mail" name="mail" required="">

                <label for="pass">Mot de passe&nbsp;:</label>
                <input id="pass" type="password" placeholder="Entrer le mot de passe" name="password" required="">
                <label for="pass2"></label>
                <input id="pass2" type="password" placeholder="Confirmation du mot de passe" name="password"
                       required="">

                <input type="submit" id="submit-register" class="link-button" value="Register">
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="panier">
        <div class="cart">
          <a href="#popup3">
            <i class="fas fa-shopping-cart"></i>
            Panier
          </a>
        </div>
        <div id="popup3" class="overlay">
          <div class="popup">
            <h2>Panier</h2>
            <a class="close" href="#">×</a>
            <div class="content-popup">
              <p>Votre panier est vide c'est bien dommage, un petit tour en <a href="./boutique.html">Boutique</a></p>
            </div>
          </div>
        </div>

        <form action="#" method="get" class="form-search">
          <button type="submit" class="btn-search">
            <i class="fas fa-search"></i>
          </button>
          <input type="search" name="q" id="site-search" placeholder="Search" autocomplete="off">
        </form>
      </div>
    </div>
  </div>

  <nav>
    <div>
      <a href="?a=readAll&c=product">Produits</a>
    </div>

    <div>
      <a href="?a=readAll&c=user">Utilisateurs</a>
    </div>
  </nav>

  <blockquote>
    <p>Nos produits, tu achèteras</p>
    <cite>L'Équipe Solo</cite>
  </blockquote>
</header>