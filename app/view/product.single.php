<div id="product-single">
    <nav>
        <a href="index.php?page=product.index" class="subtle">Retour à la boutique</a>
    </nav>
    <div class="grid fill-page">
        <section class="detail">
            <h1><?php echo $product->name ?></h1>
            <h2><?php echo $product->getPrice() ?></h2>
        </section>
        <img src="img/articles/<?php echo $product->img ?>" alt="<?php echo $product->img ?>">
        <section class="add">
            <form action="index.php?page=cart.addFromSingle" method="post">
                <input type="hidden" name="id" value=<?php echo $product->id ?>>
                <label for="quantity">Quantité</label>
                <input type="number" id="quantity" name="quantity" value="1" min="1">
                <input type="submit" value= "Ajouter au panier">
            </form>
            <h3>Description</h3>
            <?php echo $product->description ?>
        </section>
    </div>
</div>