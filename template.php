<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/ef55713c5a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <ul>
            <li><a href="index.php">Acceuil</a></li>
            <li><a href="recap.php"></a>Panier</li>
            <li><div class="basket">
                <i class="fa-solid fa-basket-shopping"></i>
                <p><?= nbrProduct(); ?></p>
            </div></li>
        </ul>
    </header>
    <?= $content ?>
</body>
</html>