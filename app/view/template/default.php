<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEMOSA - Travail du bois</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<?php 
use App\Model\CartModel;
$cart = new CartModel();

$banner = false;
if (isset($_GET['banner'])) {
    $banner = true;
}

if ($banner === true) {
?>
    <div class="banner-background"></div>
    <div class="banner">
        <p><span>NEMOSA</span></p>
        <!-- <p>Travail du bois</p> -->
    </div>
<?php
}
?>
    <header>
        <div class="main-container">
            <a href="index.php?page=product.index&banner=true">
                <img src="img/logo/NEMOSA_TDB_Couleurs.svg" alt="Logo de Laucolo" class="logo">
            </a>
            <nav>
                <ul>
                    <li><a href="index.php?page=product.index">Boutique</a></li>
                    <li><a href="index.php?page=cart.index">Mon panier<?php echo (sizeof($cart->items) === 0 ? '' : ' (' . $cart->getNbItemsTotal() . ')') ?></a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div class="main-container">
            <?php echo $content ?>
        </div>
    </main>
    <footer>
        <div class="main-container">
            <p>© NEMOSA - nemosa.com</p>
        </div>
    </footer>    
</body>
</html>