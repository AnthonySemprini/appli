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
                        "<th>Actions</th>",
                    "</tr>",
                "</thead>",
                "<tbody>";
        $totalGeneral = 0;
        foreach($_SESSION['products'] as $index => $product){
            echo "<tr>",
                    "<td>".$index."</td>",
                    "<td>".$product['name']."</td>",
                    "<td>".number_format($product['price'], 2, ",","&nbsp;")."&nbsp;€</td>",
                    "<td>".'<i class="fa-regular fa-square-plus" id="green"></i>'." ".$product['qtt']." ".'<i class="fa-regular fa-square-minus" id="red"></i>'."</td>",
                    "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                    "<td>"."<a href='traitement.php?action=delete&id='.$index.> <i class='fa-solid fa-trash-can'></a></i> </td>",
                    "</tr>";

            $totalGeneral += $product['total'];
        }
        echo "<tr>",
        "<td colspan=4>Total général : </td>",
        "<td><strong>".number_format($totalGeneral, 2, ", ","&nbsp;")."&nbsp;€</strong></td>",
        "</tr>",
            "</tbody>",
             "</table>";

    }
  ?>
  <br> 
<div class="button">
    
 <button class="myButton"><a href="traitement.php?action=deleteAll" method="get">vider panier</a></button>
 
  <button class="myButton"><a href="index.php">Ajouter produit</a></button>
  </div>  

  </div> 
  <script src="https://kit.fontawesome.com/ef55713c5a.js" crossorigin="anonymous"></script>
</body>
</html>