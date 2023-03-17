<?php
session_start();
ob_start();
require "fonction.php"
?>


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
                        $total = $product['qtt'] * $product['price']; //ajout pour prendre en compte up et down qtt 
                    ?>


                        <tbody>
                            <tr>
                                <td><?= $index ?></td>
                                <td><a href="detail.php?id=<?= $index ?>"><?= $product['name'] ?></a></td>
                                <td><?= number_format($product['price'], 2, ",", "&nbsp;") ?> &nbsp;€ </td>
                                <td> <a href="traitement.php?action=up-qtt&id=<?= $index ?>"><i class="fa-solid fa-square-plus"></i></a>
                                    <?= $product['qtt'] ?>
                                    <a href="traitement.php?action=down-qtt&id=<?= $index ?>"><i class="fa-solid fa-square-minus"></i></a>
                                </td>
                                <td><?= $product['description'] ?></td>
                                <td><?= number_format($total, 2, ",", "&nbsp;") ?> &nbsp;€</td>
                                <td> <img src='upload/<?= $product['image'] ?>'> </td>
                                <td><a href='traitement.php?action=delete&id=<?= $index ?>'> <i class='fa-solid fa-trash-can'></a></i> </td>
                            </tr>

                        <?php
                        $totalGeneral += $total;
                    } //calcul le total general
                        ?>

                        <tr>
                            <td colspan=4>Total général : </td>
                            <td><strong><?= number_format($totalGeneral, 2, ", ", "&nbsp;") ?> &nbsp;€</strong></td>
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
    
<?php
    $content = ob_get_clean();
    $titre="Panier";
    require "template.php";
?>