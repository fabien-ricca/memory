<?php include 'include/User.php';

$cardList=['img1.jpg', 'img2.png', 'img3.jpg', 'img4.jpg', 'img5.jpg', 'img6.jpg'];
    
shuffle($cardList);
var_dump($cardList);

    
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Cormorant:wght@700&family=Rubik&family=Signika&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Memory</title>
    </head>

    <body class="wall3">
        <?php include 'include/header.php' ?>

        <main class="flex">
            <div id="link-jouer">
                <a href="jeu.php">Facile</a>
            </div>
        </main>

        <footer></footer>
    </body>

</html>