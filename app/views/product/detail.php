<?php
echo '<div class="detail">';
echo '<h2>Produit ' . $value->get("name") . '</h2>';
echo "<div><img  src='{$value->getImage()}' alt='img du produit {$value->get('name')}'></div>";
echo '<p>Description ' . $value->get("description") . '</p>';
echo '<p>Prix ' . $value->get("price") . '€</p>';
$id = $value->get('product_id');
echo "<a href='?a=add&c=cart_item&id=$id' >Ajouter au panier</a>";
echo '</div>'
?>