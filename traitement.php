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
                $description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                $img = filter_input(INPUT_POST, "image", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                //verifie si les choses saisi dans les input son se que l'on attend
                if ($name && $price && $qtt && $description) {

                    // fichier uploadé
                    if (isset($_FILES['file'])) {
                        $tmpName = $_FILES['file']['tmp_name'];
                        $nameImg = $_FILES['file']['name'];
                        $size = $_FILES['file']['size'];
                        $error = $_FILES['file']['error'];
                        $type = $_FILES['file']['type'];

                        //the-joker.jpg
                        $tabExtension = explode('.', $nameImg); //('the joker','jpg')
                        $extension = strtolower(end($tabExtension)); //.jpg
                        $tailleMax = 400000; //taille maximum

                        $extensionAutorisees = ['jpg', 'jpeg', 'gif', 'png']; //tableau des extension autorisees


                        if (in_array($extension, $extensionAutorisees) && $size <= $tailleMax && $error == 0) { //extension  et taille max autorisees et pas d'erreur

                            $uniqueName = uniqid('', true); //cree un nom unique a l'image pour evite doublon
                            $fileName = $uniqueName . '.' . $extension;



                            move_uploaded_file($tmpName, './upload/' . $fileName); //deplace les fichier dans /upload/
                        } else {
                            echo "Mauvaise extension ou taille trop importante ou erreur";
                        }
                    }

                    $product = [
                        "name" => $name,
                        "price" => $price,
                        "qtt" => $qtt,
                        "description" => $description,
                        "image" => $fileName,
                        "total" => $price * $qtt
                    ];
                    //   var_dump($fileName);die;  
                    $_SESSION['products'][] = $product;
                }
            }

            break;

            //*----------- VIDER LE PANIER -----------------------------
        case "deleteAll":
            unset($_SESSION['products']);
            $_SESSION['message'] = "Le pannier a été vidé";
            header("Location: recap.php");
            die;
            break;

            //*----------- SUPPRIMER UN PRODUIT ------------------------
            // 
        case "delete":
            // si l'id est défini et si le produit existe dans la session
            if (isset($_GET["id"]) && isset($_SESSION["products"][$_GET["id"]])) {
                $supprProduct = $_SESSION['products'][$_GET["id"]]['name'];// creation d'une nouvel variable pour pour donne le nom du product apres l'avoir suppr
                unset($_SESSION['products'][$_GET['id']]);
                $_SESSION['message'] = "Le produit"." " .$supprProduct." "."est supprimé";
                header("Location: recap.php");
                die;
            }
            break;

            //*----------- AUGMENTER LA QUANTITE D'UN PRODUIT ----------
        case "up-qtt":
            if (isset($_GET["id"]) && isset($_SESSION["products"][$_GET["id"]])) {
                $_SESSION['products'][$_GET['id']]['qtt']++;
                header("Location: recap.php");
                die;
            }
            break;

            //*----------- DIMINUER LA QUANTITER D'UN PRODUIT ----------
        case "down-qtt":
            if (isset($_GET["id"]) && isset($_SESSION["products"][$_GET["id"]])) {

                if ($_SESSION['products'][$_GET['id']]['qtt'] == 1) {
                    $supprProduct = $_SESSION['products'][$_GET["id"]]['name'];
                    unset($_SESSION['products'][$_GET['id']]);
                    $_SESSION['message'] =  "Le produit"." " .$supprProduct." "."est supprimé";
                    header("Location: recap.php");
                } else {
                    $_SESSION['products'][$_GET['id']]['qtt']--;
                    header("Location: recap.php");
                }

                die;
                break;
            }
    }
    header("Location:index.php");
}
