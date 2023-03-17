<?php
session_start();
ob_start();
require "fonction.php";
?>

<div class="ficheProduit">
    <div class="imgProduit">
        <img  src='upload/<?= $_SESSION['products'][$_GET['id']]['image']?>'>
    </div>
    <div class="partiTexte">
        <div class="info">
            <h2><?= $_SESSION['products'][$_GET['id']]['name'] ?></h2>
            <span><?= number_format($_SESSION['products'][$_GET['id']]['price'], 2, ",", "&nbsp;") ?> &nbsp;€ </span>
        </div>
        <p><?= $_SESSION['products'][$_GET['id']]['description'] ?></p>
    </div>
</div>


<?php
$titre="Panier";
$content = ob_get_clean();
require "template.php";
?>