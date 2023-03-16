
<?php
                echo message(); 
                
                function message(){
                if(isset($_SESSION["message"]) && !empty($_SESSION["message"])){
                    $playMsg = $_SESSION["message"];
                    unset( $_SESSION['message']);
                    return $playMsg;
                }
            }
                ?>
          

<?php
            function nbrProduct(){
            $nbrProduct = 0;
            if (!isset($_SESSION['products']) && empty($_SESSION['products'])) {//si array est vide affiche 0
                $nbrProduct = 0;
            } else {
            foreach ($_SESSION['products'] as $index => $product)
                $nbrProduct += $product['qtt'];//compte l'ensemble des produits du panier
            }
            return $nbrProduct;
            }

            ?>