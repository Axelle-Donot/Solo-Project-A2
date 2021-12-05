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
        <?php if (!Session::isConnected()) { ?>
        <div class="login">
          <i class="fas fa-user"></i>
          <a href="?a=login&c=user" class="login-a">Se connecter</a>
        </div>
        <span>|</span>
        <div class="register">
          <a href="?a=register&c=user">S'inscrire</a>
        </div>
        <?php } else { ?>
          <div class="login">
            <i class="fas fa-user"></i>
            <a href="?a=profile&c=user" class="login-a">Profil</a>
          </div>
        <?php } ?>
      </div>
      <div class="panier">
        <div class="cart">
          <a href="?a=showCart&c=user">
            <i class="fas fa-shopping-cart"></i>
            Panier
          </a>
        </div>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-light" type="submit">Search</button>
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

    <div>
      <a href="?a=goContact&c=home">Contact</a>
    </div>
  </nav>

  <blockquote>
    <p>Nos produits, tu achèteras</p>
    <cite>L'Équipe Solo</cite>
  </blockquote>
</header>