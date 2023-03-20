<?php 
    include 'include/User.php';
    include 'include/Card.php';
    include 'include/Game.php';
    session_start(); 
    
    $cards = $_SESSION['board'];            // On stocke les cartes dans une variable pour les afficher
    
    if(isset($_POST['card'])){
        $post = $_POST['card'];
        $board = new Game();
        $board->game($post);

        $card = new Card($index = NULL, $idCard = NULL, $state = false);
        if($board->win()){
            header('location: win.php');
        }
    }
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
            <section class="flex" id="card-container">
                <form id="form-card" method="post"></form>

                <?php for($i=0; isset($cards[$i]); $i++){ ?>
                    <button form="form-card" name="card" class="card-button" value="<?= $cards[$i]->getIndex(); ?>"><?= $cards[$i]->getDisplay(); ?></button>
                <?php }?>
            </section>
        </main>
    </body>
</html>