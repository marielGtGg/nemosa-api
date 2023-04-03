<div id="cart-index">
    <h1>Mon panier</h1>
    <?php if (sizeof($cart->items) > 0) : ?>
    <div class="fill-page">
        <div class="cart-items">
            <table class="cart-items-table">
                <colgroup>
                    <col class="img">
                    <col class="product">
                    <col class="qty">
                    <col class="price">
                    <col class="total">
                    <col class="action">
                </colgroup>
                <thead>
                    <tr>
                        <th></th>
                        <th class="product">Article</th>
                        <th>Quantité</th>
                        <th>Prix</th>
                        <th>Montant</th>
                        <th></th>
                    </tr>
                </thead> 
                <tbody>
                <?php foreach ($cart->items as $item) : ?>
                    <tr class="item-row">
                        <td class="img"><img src="img/articles/<?php echo $item->product->img ?>" alt="<?php echo $item->product->name ?>"></td>
                        <td class="product">
                            <a href="<?php echo $item->product->getUrl() ?>" class="hover-highlight">
                                <?php echo $item->product->name ?>
                            </a>
                        </td>   
                        <td class="qty">
                            <div class="quantity">
                                <form action="index.php?page=cart.increaseQty" method="post">
                                    <input type="hidden" name="id" value=<?php echo $item->product->id ?>>
                                    <input type="hidden" name="quantity" value=-1>
                                    <input type="submit" value= "-">
                                </form>    
                                <div class="number"><?php echo $item->quantity ?></div>
                                <form action="index.php?page=cart.increaseQty" method="post">
                                    <input type="hidden" name="id" value=<?php echo $item->product->id ?>>
                                    <input type="hidden" name="quantity" value=1>
                                    <input type="submit" value= "+">
                                </form>    
                            </div>
                        </td>
                        <td class="price"><?php echo $item->product->getPrice() ?></td>
                        <td class="total"><?php echo $item->getTotal()[1] ?></td>
                        <td class="action">
                            <form action="index.php?page=cart.deleteItem" method="post">
                                <input type="hidden" name="id" value=<?php echo $item->product->id ?>>
                                <input type="submit" class="subtle" value= "Retirer du panier">
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
                    <tr class="total-row">
                        <td></td>
                        <td class="total">Total</td>
                        <td class="empty"></td>
                        <td class="empty"></td>
                        <td class="price"><?php echo $cart->getPriceTotal()[1] ?></td>
                        <td>
                        <?php if (sizeof($cart->items) !== 0) : ?>    
                            <form action="index.php?page=cart.emptyCart" method="post">
                                <input type="submit" class="subtle" value= "Vider le panier">
                            </form>
                        <?php endif ?>
                        </td>
                    </tr>
                </tbody> 
            </table>
        </div>
        <div class="checkout">
            <form action="index.php?page=cart.checkout" method="post">
                <input type="submit" value="Procéder au paiement">
            </form>
        </div>
        <?php else : ?>
        <div class="center-vertically">
            <p class="text-center">Votre panier est vide.</p>
            <a href="index.php?page=product.index" class="btn block-center">Passez voir la boutique</a>
        </div>
        <?php endif ?>
    </div>    
</div>
