<form method="post" action="index.php?action=upadated">
    <fieldset>
        <legend>Modifier un sabre :</legend>

        <p>
            <label for="tag_produit">Tag</label> :
            <input type="text" value="<?php echo htmlspecialchars($value->get("tag_id")); ?>" name="tag" id="tag_produit"/>
        </p>
        <p>
            <label for="Discount_product">Discount</label> :
            <input type="text" value="<?php echo htmlspecialchars($value->get("discount_id")); ?>" name="discount" id="Discount_product"/>
        </p>
        <p>
            <label for="name_product">Name</label> :
            <input type="text" value="<?php echo htmlspecialchars($value->get("name")); ?>" name="name" id="name_product" required/>
        </p>
         <p>
            <label for="description_product">Description</label> :
            <input type="text" value="<?php echo htmlspecialchars($value->get("description")); ?>" name="description" id="description_product"/>
        </p>
         <p>
            <label for="price_product">Price</label> :
            <input type="text" value="<?php echo htmlspecialchars($value->get("price")); ?>" name="price" id="price_product" required/>
        </p>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>