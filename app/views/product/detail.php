<?php
        echo '<div class="detail">';
                echo '<h2> ' . $value->get("name") . '</h2>';
                echo "<div><img  src='{$value->getBlob()}' alt='img du produit {$value->get('name')}'></div>";
                echo '<p>Description ' . $value->get("description") . '</p>';
                echo '<p>Prix ' . $value->get("price") . '€</p>';
                $id= $value->get('product_id');
                echo "<a href='?a=ajout&c=cart_item&id=$id'>Ajouter au panier</a>";
                echo "<a href='?a=delete&c=product&id=$id'>Supprimer le produit</a>";   // uniquements pour les admins 
                echo "<a href='?a=update&c=product&id=$id'>Modifier le produit</a>";   // uniquements pour les admins 
        echo '</div>'
?>