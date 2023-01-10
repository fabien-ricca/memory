<?php 
    include 'include/User.php';
    include 'include/Card.php';
    session_start(); 
    

    $cartes = $_SESSION['cards'];
     var_dump($cartes);
     var_dump($_POST);


     if(isset($_POST['card'])){
        $index = $_POST['card'];
        $idcard = $cartes[$index]->getIdcard();

        $verifIndex = 
        echo $index;
        echo $idcard;

        if($index = )

        $cartes[$idcard]->setState(true);
        $_SESSION['idcard'] = $_POST['card'];
        

        //var_dump($_SESSION['idcard']);
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
            <form id="form-card" method="post"></form>

            <button form="form-card" name="card" class="card-button" value="<?= $cartes['0']->getIndex(); ?>"><?= $cartes['0']->getDisplay(); ?></button>

            <button form="form-card" name="card" class="card-button" value="<?= $cartes['1']->getIndex(); ?>"><?= $cartes['1']->getDisplay(); ?></button>

            <button form="form-card" name="card" class="card-button" value="<?= $cartes['2']->getIndex(); ?>"><?= $cartes['2']->getDisplay(); ?></button>

            <button form="form-card" name="card" class="card-button" value="<?= $cartes['0']->getIndex(); ?>"><?= $cartes['0']->getDisplay(); ?></button>

            <button form="form-card" name="card" class="card-button" value="<?= $cartes['1']->getIndex(); ?>"><?= $cartes['1']->getDisplay(); ?></button>

            <button form="form-card" name="card" class="card-button" value="<?= $cartes['2']->getIndex(); ?>"><?= $cartes['2']->getDisplay(); ?></button>
        
                
            
            
        </main>

        <footer></footer>
    </body>

</html>