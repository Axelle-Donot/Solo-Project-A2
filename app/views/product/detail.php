<?php
        echo '<h2>Produit ' . $value->get("name") . '</h2>';
        echo "<div class = 'image'><img  src='{$value->getBlob()}' alt='img du produit {$value->get('name')}'></div>";
        echo '<p>Description ' . $value->get("description") . '</p>';
        echo '<p>Prix ' . $value->get("price") . '€</p>';
?>