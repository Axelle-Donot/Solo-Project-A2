<form method="post" action="index.php?a=created&c=product">
  <fieldset>
    <legend>Créer un sabre :</legend>
    <p>
      <label for="tag_produit">Tag :</label>
      <select name="tag" id="tag_produit">
        <?php foreach (ModelTag::selectAll() as $tag) { ?>
          <option value="<?= urlencode($tag->getTagId()) ?>"><?= htmlspecialchars($tag->getName()) ?></option>
        <?php } ?>
      </select>
    </p>
    <p>
      <label for="discount_product">Discount :</label>
      <select name="discount" id="discount_product">
        <?php foreach (ModelDiscount::selectAll() as $discount) { ?>
          <option value="<?= urlencode($discount->getDiscountId()) ?>"><?= htmlspecialchars($discount->getReduction()) ?> (pourc : <?= htmlspecialchars($discount->IsPercentage()) ?>)</option>
        <?php } ?>
      </select>
    </p>
    <p>
      <label for="name_product">Nom :</label>
      <input type="text" placeholder="mpp" name="name" id="name_product" required/>
    </p>
    <p>
      <label for="description_product">Description :</label>
      <input type="text" placeholder="Lorem ipsum dolor sit amet" name="description" id="description_product"/>
    </p>
    <p>
      <label for="price_product">Prix :</label>
      <input type="text" placeholder="399,90" name="price" id="price_product" required/>
    </p>
    <p>
      <input type="submit" value="Envoyer"/>
    </p>
  </fieldset>
</form>