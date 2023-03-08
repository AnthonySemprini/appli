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
    <title>Réecapitulatif des produits</title>
</head>
<body>

<h1>Panier</h1>
    <div class="tab">
  <?php
    if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
        echo "<p>Aucun produit en session...</p>";
    }
    else{
        echo "<table>",
                "<thead>",
                    "<tr>",
                        "<th>#</th>",
                        "<th>Nom</th>",
                        "<th>Prix</th>",
                        "<th>Quantité</th>",
                        "<th>Total</th>",
                    "</tr>",
                "</thead>",
                "<tbody>";
        $totalGeneral = 0;
        foreach($_SESSION['products'] as $index => $product){
            echo "<tr>",
                    "<td>".$index."</td>",
                    "<td>".$product['name']."</td>",
                    "<td>".number_format($product['price'], 2, ",","&nbsq;")."€</td>",
                    "<td>".$product['qtt']."</td>",
                    "<td>".number_format($product['total'], 2, ",", "&nbsq;")."€</td>",
                "</tr>";
            $totalGeneral += $product['total'];
        }
        echo "<tr>",
        "<td colspan=4>Total général : </td>",
        "<td><strong>".number_format($totalGeneral, 2, ", ","&nbsq;")."</strong></td>",
        "</tr>",
            "</tbody>",
             "</table>";

    }
  ?>
  <br> 

 <button class="myButton" action="traitement.php?action=delete" method="get">vider panier</button>
  <br>
  <button class="myButton"><a href="index.php">Ajouter produit</a></button>
  

  </div> 
</body>
</html>