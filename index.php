<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ajout produit</title>
</head>

<body>
    <div class="tab">

        <h1 class="ajout">Ajouter un produit</h1>
        <form action="traitement.php?action=add" method="post" class="form1" enctype="multipart/form-data">
            <p>
                <label>
                    Nom du produit :
                    <input type="text" name="name" class="saisi">
                </label>
            </p>
            <p>
                <label>
                    Prix du produit :
                    <input type="number" step="any" name="price" class="saisi" >
                </label>
            </p>
            <p>
                <label>
                    Quantité désirée :
                    <input type="number" name="qtt" value="1" class="saisi">
                </label>
            </p>
            <p>
                <label>
                    Description :
                    <textarea name="description" rows="5" cols="25" placeholder="Entrez votre texte..."></textarea>
                </label>
            </p>
            <p>
                <label for="file">Fichier</label>    
                <input type="file" name="file" id="file">
            </p>
            <p>
                <input type="submit" name="submit" value="Ajouter le produit" class="ajoutPanier">
            </p>
        </form>

        <br>

        <button class="myButton"><a href="recap.php">Panier</a></button>
    </div>
</body>

</html>