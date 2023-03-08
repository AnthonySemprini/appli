<?php
session_start();

if (isset($_GET['action'])) {

    switch ($_GET['action']) {

            //*----------- AJOUTER PRODUIT ------------------
        case "add":
            if (isset($_POST["submit"])) {

                $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT);

                if ($name && $price && $qtt) {

                    $product = [
                        "name" => $name,
                        "price" => $price,
                        "qtt" => $qtt,
                        "total" => $price * $qtt
                    ];
                    $_SESSION['products'][] = $product;
                }
            }

            //*----------- SUPPRIMER UN PRODUIT -------------------
            case "delete":
                if(isset($_GET["delete"])){
                    $product = array();
                }
            //*----------- VIDER LE PANIER ------------------------
            case "clear":
            //*----------- AUGMENTER LA QUANTITE D'UN PRODUI ------
            case "up-qtt":
            //*----------- DIMINUER LA QUANTITER D'UN PRODUIT -----
            case "down-qtt":
    }
}
header("Location:index.php");
