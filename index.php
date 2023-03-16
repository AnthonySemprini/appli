<?php
session_start();
ob_start();
require "fonction.php";
?>


    <div class="tab">


        <h1 class="ajout">Ajouter un produit</h1>

        <form action="traitement.php?action=add" method="post" class="form1" enctype="multipart/form-data">
            <fieldset class="addProduit">
                <legend> Produit </legend>
                <label>
                    Nom du produit :
                    <input type="text" name="name" class="saisi">
                </label>

                <label>
                    Prix du produit :
                    <input type="number" step="any" name="price" class="saisi">
                </label>

                <label>
                    Quantité désirée :
                    <input type="number" name="qtt" value="1" class="saisi">
                </label>

                <label>
                    Description :
                    <textarea name="description" rows="5" cols="25" placeholder="Entrez votre texte..."></textarea>
                </label>
                <div class="image">
                    <label for="file">Image du produit :</label>
                    <input type="file" name="file" id="file">
                </div>
            </fieldset>
            <div class="button">
                <input type="submit" name="submit" value="Ajouter le produit" class="ajoutPanier">
                <button class="myButton"><a href="recap.php">Panier</a></button>
                <div />
        </form>
    </div>
    <?php
    $content = ob_get_clean();
    $titre="Ajout produit";
    require "template.php";
?>