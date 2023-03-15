<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Smokum&display=swap" rel="stylesheet">
        <title>Récapitulatif des produits</title>
    </head>

    <body>
    <div id=container>
            <div class="tab1">
                        <h1 class="pan">Panier</h1>

                        <?php
                    if (!isset($_SESSION['products']) || empty($_SESSION['products'])) {
                            echo "<p>Aucun produit en session...</p>";
                            } else {
                    ?>   
                                
                <table>
                    <thead>",
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Description</th>
                            <th>Total</th>
                            <th>Photo</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                        <?php
                        $totalGeneral = 0;
                        foreach ($_SESSION['products'] as $index => $product) {
                        $total = $product['qtt'] * $product['price'];//ajout pour prendre en compte up et down qtt ?>
                        

                    <tbody>
                        <tr>
                            <td><?= $index ?></td>
                            <td><?= $product['name'] ?></td>
                            <td><?= number_format($product['price'], 2, ",", "&nbsp;")?> &nbsp;€ </td>
                            <td> <a href="traitement.php?action=up-qtt&id=<?= $index ?>"><i class="fa-solid fa-square-plus"></i></a>
                                <?= $product['qtt'] ?>
                                <a href="traitement.php?action=down-qtt&id=<?= $index ?>"><i class="fa-solid fa-square-minus"></i></a></td>
                            <td><?= $product['description'] ?></td>
                            <td><?= number_format($total, 2, ",", "&nbsp;") ?> &nbsp;€</td>
                            <td>    <img src='upload/<?= $product['image'] ?>'>   </td>
                            <td><a href='traitement.php?action=delete&id=<?= $index ?>'> <i class='fa-solid fa-trash-can'></a></i> </td>
                        </tr>

                        <?php
                        $totalGeneral += $total; 
                        } //calcul le total general
                        ?>

                        <tr>
                            <td colspan=4>Total général : </td>
                            <td><strong><?= number_format($totalGeneral, 2, ", ", "&nbsp;")?>  &nbsp;€</strong></td>
                        </tr>
                    </tbody>
                </table>
            <?php
            }
            ?>
                    <br>
                    <div class="button">

                        <button class="myButton"><a href="traitement.php?action=deleteAll" method="get">vider panier</a></button>

                        <button class="myButton"><a href="index.php">Ajouter produit</a></button>
                    </div>

            </div>
        </div>
        <script src="https://kit.fontawesome.com/ef55713c5a.js" crossorigin="anonymous"></script>
    </body>
</html>