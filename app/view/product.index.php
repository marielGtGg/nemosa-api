<h1>En vedette</h1>
<div class="products">
<?php foreach ($products as $product) : ?> 
    <div class="product">
        <a href=<?php echo $product->getUrl() ?>>
            <div class="img">
                <img src="img/articles/<?php echo $product->img ?>" alt="<?php echo $product->img ?>">
            </div>
        </a>  
        <div class="product-detail">
            <a href=<?php echo $product->getUrl() ?>>
                <p class="hover-highlight"><?php echo $product->name ?></p>
                <p class="price hover-highlight"><?php echo $product->getPrice() ?></p>
            </a>
            <form action="index.php?page=cart.addFromIndex" method="post">
                <input type="hidden" name="id" value=<?php echo $product->id ?>>
                <label for="quantity">Quantité</label>
                <input type="number" id="quantity" name="quantity" value="1" min="1">
                <input type="submit" value= "Ajouter au panier">
            </form>
        </div>
    </div> 
<?php endforeach ?>
</div>
