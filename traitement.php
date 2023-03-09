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
                    $_SESSION['products'][]= $product;
                }
            }
            break;

            //*----------- VIDER LE PANIER -----------------------------
            case "deleteAll":
                unset($_SESSION['products']);
                header("Location: recap.php");
                die;
                break;
                
            //*----------- SUPPRIMER UN PRODUIT ------------------------
            // 
            case "delete":
                // si l'id est défini et si le produit existe dans la session
                if(isset($_GET["id"]) && isset($_SESSION["products"][$_GET["id"]])) {
                    unset($_SESSION['products'][$_GET['id']]);
                    header("Location: recap.php");
                    die;
                }
                break;
               
            //*----------- AUGMENTER LA QUANTITE D'UN PRODUIT ----------
            case "up-qtt":
                if(isset($_GET["id"]) && isset($_SESSION["products"][$_GET["id"]])) {
                    die;
                }
                break;

            //*----------- DIMINUER LA QUANTITER D'UN PRODUIT ----------
            case "down-qtt":
                if(isset($_GET["id"]) && isset($_SESSION["products"][$_GET["id"]])) {

                    if($_SESSION['products'][$_GET['id']]['qtt'] ==1){
                        unset($_SESSION['products'][$_GET['id']]);
                        header("Location: recap.php");
                    }

                    else{
                        $_SESSION['products'][$_GET['id']]['qtt']--;
                        header("Location: recap.php");
                    }

                    die;
                    break;
                }
}
header("Location:index.php");
}