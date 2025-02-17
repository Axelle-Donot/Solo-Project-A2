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
          <i class="fas fa-user m-1"></i>
          <a href="?a=login&c=user" class="login-a">Se connecter</a>
        </div>
        <span>|</span>
        <div class="register">
          <a href="?a=register&c=user">S'inscrire</a>
        </div>
        <?php } else { ?>
          <div class="login position-relative">
            <i class="fas fa-user"></i>
            <a href="?a=profile&c=user" class="login-a mx-2">Profil</a>
            <div class="submenu">
              <div><a href="?a=disconnect&c=user">Se déconnecter</a></div>
            </div>
          </div>
        <?php } ?>
      </div>
      <div class="panier">
        <div class="cart">
          <a href="?a=read&c=cart">
            <i class="fas fa-shopping-cart mx-1"></i>
            Panier
          </a>
        </div>
        <form method="get" class="d-flex">
          <input type="hidden" name="a" value="search">
          <input class="form-control me-1" name="q" type="search" placeholder="Recherche..." aria-label="Search">
          <button class="btn btn-light" type="submit"><i class="fas fa-search"></i></button>
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
      <a href="?a=contact">Contact</a>
    </div>
  </nav>

  <blockquote>
    <p>Nos produits, tu achèteras</p>
    <cite>L'Équipe Solo</cite>
  </blockquote>
</header>