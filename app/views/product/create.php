<form method="post" action="index.php?a=created&c=product">
    <fieldset>
        <legend>Crée un sabre :</legend>
        <p>
            <label for="tag_produit">Tag</label> :
            <input type="text" placeholder="1" name="tag" id="tag_produit"/>
        </p>
        <p>
            <label for="Discount_product">Discount</label> :
            <input type="text" placeholder="2" name="discount" id="Discount_product"/>
        </p>
        <p>
            <label for="name_product">Name</label> :
            <input type="text" placeholder="mpp" name="name" id="name_product" required/>
        </p>
         <p>
            <label for="description_product">Description</label> :
            <input type="text" placeholder="Lorem ipsum dolor sit amet" name="description" id="description_product"/>
        </p>
         <p>
            <label for="price_product">Price</label> :
            <input type="text" placeholder="399,90" name="price" id="price_product" required/>
        </p>
        <p>
            <input type="submit" value="Envoyer" />
        </p>
    </fieldset>
</form>