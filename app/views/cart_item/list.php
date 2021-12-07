<h2>Contenu de votre panier :</h2>
<div>
    <?php
    foreach ($tab_items as $item) {
        $id = $item['product_id'];
        $q = $item['quantity'];
        echo "<div>";
        echo "<p>Produit : $id pour une quantité $q</p>";
        echo " </div>";
    };
    //Pour plus tard
    //echo "<a href='?a=pay&c=cart_item&id=$id'>Payer</a>";
    ?>

</div>