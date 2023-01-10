<?php 
    include 'include/User.php';
    include 'include/Card.php';
    session_start(); 
    

    $cartes = $_SESSION['cards'];
     //var_dump($cartes);
     
    

    
    if(isset($_POST['card'])){                          // Quand une carte est cliquée
        $index = $_POST['card'];                            // On récupère l'index renvoyé par la carte 
        $idcard = $cartes[$index]->getIdcard();             // On récupère l'idcard associé à l'index
        echo "Index : " . $index."<br>";
        echo "idCard : " . $idcard."<br>";
         
        $cartes[$index]->setState(true);                    // On passe l'état de la carte sur true (face)
        $_SESSION['idcard'] = $_POST['card'];
        $_SESSION['countTry']++;                            // On incrémente le compeur (pour limiter le nombre de cartes retourées)

        if($_SESSION['countTry'] > 2){                          // Si le compteur atteind 2
            $_SESSION['countTry'] = 0;                              // On le remet à zéro

            for($i=0; $i<=5; $i++){                                 // on remet les états de toutes les cartes sur false (recto) //TODOO: Ne retourner que les deux cartes.
                $cartes[$i]->setState(false);
                
            }
        }
        echo $_SESSION['countTry'];


        
        

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

            <button form="form-card" name="card" class="card-button" value="<?= $cartes['3']->getIndex(); ?>"><?= $cartes['3']->getDisplay(); ?></button>

            <button form="form-card" name="card" class="card-button" value="<?= $cartes['4']->getIndex(); ?>"><?= $cartes['4']->getDisplay(); ?></button>

            <button form="form-card" name="card" class="card-button" value="<?= $cartes['5']->getIndex(); ?>"><?= $cartes['5']->getDisplay(); ?></button>
        
                
            
            
        </main>

        <footer></footer>
    </body>

</html>