<?php if (!Session::isConnected()) { ?>
  <div>Vous n'avez pas créé de compte chez Solo, ce n'est pas grave, vous pouvez quand même commander&nbsp;!</div>
  <div class="row">
    <div class="col-75">
      <div class="container">
        <form action="?a=ordered&c=payment" method="post">
          <div class="row">
            <div class="center">
              <h3>Adresse de livraison</h3>
              <p>*Attention Solo considère que l'adresse de livraison est la même que celle de
                facturation.</p>
              <div class="form-label">
                <label for="fname"><i class="fa fa-user"></i> Nom complet</label>
                <input type="text" id="fname" name="firstname" placeholder="John M. Doe" required>
              </div>
              <div class="form-label">
                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                <input type="text" id="email" name="email" placeholder="john@example.com" required>
              </div>
              <div class="form-label">
                <label for="adr"><i class="fa fa-location-arrow"></i> Addresse</label>
                <input type="text" id="adr" name="address" placeholder="542 W. 15th Street" required>
              </div>
              <div class="form-label">
                <label for="city"><i class="fa fa-building"></i> Ville</label>
                <input type="text" id="city" name="city" placeholder="New York" required>
              </div>
              <div class="row">
                <div class="form-label">
                  <label for="country">Pays</label>
                  <input type="text" id="country" name="country" placeholder="France" required>
                </div>
                <div class="form-label">
                  <label for="region">Région</label>
                  <input type="text" id="region" name="region" placeholder="Occitanie" required>
                </div>
                <div class="form-label">
                  <label for="zip">Code Postal</label>
                  <input type="text" id="zip" name="zip" placeholder="10001" required>
                </div>
              </div>
            </div>
          </div>
          <div class="center">
            <h3>Paiement</h3>
            <div>
              <p>*Les différents moyens de paiements acceptés par Solo sont MasterCard, Paypal, Visa et
                Amex.</p>
            </div>
            <div class="form-label">
              <label for="cname">Nom titulaire</label>
              <input type="text" id="cname" name="cardname" placeholder="John More Doe" required>
            </div>
            <div class="form-label">
              <label for="ccnum">N° de carte</label>
              <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required>
            </div>
            <div class="form-label">
              <label for="expmonth">Mois d'expiration</label>
              <input type="text" id="expmonth" name="expmonth" placeholder="September" required>
            </div>
            <div class="row">
              <div class="form-label">
                <label for="expyear">Année d'expiration</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018" required>
              </div>
              <div class="form-label">
                <label for="cvv">CVV</label>
                <input type="number" id="cvv" name="cvv" placeholder="352" size="3" sirequired>
              </div>
            </div>
          </div>
          <div class="center">
            <input type="submit" value="Payer" class="btn btn-info">
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="col-25">
    <div class="container">
      <?php $total_price = 0; ?>
      <h4>Panier</h4>
      <?php
      foreach ($tab_items as $item) {
        $p = ModelProduct::select($item['product_id']);
        $q = htmlspecialchars($item['quantity']);
        $total_price += $p->get('price') * (int)$q ?>
        <div>
          <a class="link-info" href='?a=read&c=product&id=<?= urlencode($p->get('product_id')) ?>' target="_blank">
            <?= $q ?> x <?= htmlspecialchars($p->get('name')) ?>
          </a>
          <span class="price">
                        <?= htmlspecialchars($p->get('price')) ?>
                    </span>
        </div>
      <?php } ?>
      <hr>
      <div>Total
        <span class="price" style="color:black"><b><?= htmlspecialchars($total_price) ?></b></span>
      </div>
    </div>
  </div>
<?php } else { ?>
  <div>Merci d'être un client fidèle de Solo.</div>
  <div class="row">
    <div class="col-75">
      <div class="container">
        <form action="?a=ordered&c=payment" method="post">
          <div class="row">
            <div class="center">
              <?php
              $u = ModelUser::select($user);
              $addr = $u->getAdresse();
              ?>
              <h3>Adresse de livraison</h3>
              <p>*Attention Solo considère que l'adresse de livraison est la même que celle de
                facturation.</p>
              <div class="form-label">
                <label for="fname"><i class="fa fa-user"></i> Nom complet</label>
                <input type="text" id="fname" name="firstname" placeholder="John M. Doe"
                       value="<?= htmlspecialchars($u->get('first_name') . ' ' . $u->get('last_name')) ?>" required>
              </div>
              <div class="form-label">
                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                <input type="text" id="email" name="email" placeholder="john@example.com"
                       value="<?= htmlspecialchars($u->get('mail')) ?>" required>
              </div>
              <div class="form-label">
                <label for="adr"><i class="fa fa-location-arrow"></i> Addresse</label>
                <input type="text" id="adr" name="address" placeholder="542 W. 15th Street"
                       value="<?= htmlspecialchars($addr->get('street') ?? '') ?>" required>
              </div>
              <div class="form-label">
                <label for="city"><i class="fa fa-building"></i> Ville</label>
                <input type="text" id="city" name="city" placeholder="New York"
                       value="<?= htmlspecialchars($addr->get('city') ?? '') ?>" required>
              </div>
              <div class="form-label">
                <label for="region">Région</label>
                <input type="text" id="region" name="region" placeholder="Occitanie"
                       value="<?= htmlspecialchars($addr->get('state') ?? '') ?>" required>
              </div>
              <div class="form-label">
                <label for="zip">Code Postal</label>
                <input type="text" id="zip" name="zip" placeholder="10001"
                       value="<?= htmlspecialchars($addr->get('zip_code') ?? '') ?>" required>
              </div>
              <div class="form-label">
                <label for="country">Pays</label>
                <input type="text" id="country" name="country" placeholder="France"
                       value="<?= htmlspecialchars($addr->get('country') ?? '') ?>" required>
              </div>
            </div>
            <div class="center">
              <h3>Paiement</h3>
              <div>
                <p>*Les différents moyens de paiements acceptés par Solo sont MasterCard, Paypal, Visa
                  et Amex.</p>
              </div>
              <div class="form-label">
                <label for="cname">Nom titulaire</label>
                <input type="text" id="cname" name="cardname" placeholder="John More Doe"
                       value="<?= htmlspecialchars($u->get('first_name') . ' ' . $u->get('last_name')) ?>" required>
              </div>
              <div class="form-label">
                <label for="ccnum">N° de carte</label>
                <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required>
              </div>
              <div class="form-label">
                <label for="expmonth">Mois d'expiration</label>
                <input type="text" id="expmonth" name="expmonth" placeholder="September" required>
              </div>
              <div class="row">
                <div class="form-label">
                  <label for="expyear">Année d'expiration</label>
                  <input type="text" id="expyear" name="expyear" placeholder="2018" required>
                </div>
                <div class="form-label">
                  <label for="cvv">CVV</label>
                  <input type="number" id="cvv" name="cvv" size="3" placeholder="352" required>
                </div>
              </div>
            </div>
          </div>
          <div class="center">
            <input type="submit" value="Payer" class="btn btn-info">
          </div>
        </form>
      </div>
    </div>

    <div class="col-25">
      <div class="container">
        <?php $total_price = 0; ?>
        <h4>Panier</h4>
        <?php
        foreach ($tab_items as $item) {
          $p = ModelProduct::select($item['product_id']);
          $q = htmlspecialchars($item['quantity']);
          $total_price += $p->get('price') * (int)$q ?>
          <div>
            <a class="link-info" href='?a=read&c=product&id=<?= urlencode($p->get('product_id')) ?>' target="_blank">
              <?= $q ?> x <?= htmlspecialchars($p->get('name')) ?>
            </a>
            <span class="price">
                            <?= htmlspecialchars($p->get('price')) ?>
                        </span>
          </div>
        <?php } ?>
        <hr>
        <div>Total
          <span class="price" style="color:black">
                    <b><?= htmlspecialchars($total_price) ?></b>
                </span>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
