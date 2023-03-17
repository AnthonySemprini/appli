<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ef55713c5a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title><?= $titre ?></title>
</head>
<body>
    <header>
       <nav>
           <a href="index.php">Acceuil</a>
           <a href="recap.php">Panier</a>
        </nav> 
        <div class="basket">
                <i class="fa-solid fa-basket-shopping"></i>
                <p><?= nbrProduct(); ?></p>
            </div>
        
    </header>
    <?= $content ?>
</body>
</html>