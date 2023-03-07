<?php
    session_start();
    // Cette fonction a deux utilités : démarrer une session sur le serveur pour l'utilisateur
    // courant, ou récupérer la session de ce même utilisateur s'il en avait déjà une. 

    if(isset($_POST['submit'])){

        $name = filter_input(INPUT_POST, "name",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $qtt = filter_input(INPUT_POST,"qtt", FILTER_VALIDATE_INT);

        if($name && $price && $qtt){

            $product = [
                "name" => $name,
                "price" => $price,
                "qtt" => $qtt,
                "total" => $price*$qtt
            ];
            $_SESSION['product'][] = $product;

        }
    }
    header("Location:index.php");
//     Nous vérifions alors l'existence de la clé "submit" dans le tableau $_POST, celle clé
// correspondant à l'attribut "name" du bouton <input type="submit" name="submit"> du
// formulaire. La condition sera alors vraie seulement si la requête POST transmet bien une
// clé "submit" au serveur.
// Dans l'autre cas, la ligne 8 effectue une redirection grâce à la fonction header(). Il n'y a pas
// de "else" à la condition puisque dans tous les cas (formulaire soumis ou non), nous
// souhaitons revenir au formulaire après traitement. 