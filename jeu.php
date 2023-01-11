<?php 
    include 'include/User.php';
    include 'include/Card.php';
    session_start(); 
    

    $cartes = $_SESSION['cards'];
     //var_dump($cartes);
     

    
    if(isset($_POST['card'])){                          // Quand une carte est cliquée
        $_SESSION['countTry']++;                            // On incrémente le compeur (pour limiter le nombre de cartes retourées)
        $index = $_POST['card'];                            // On récupère l'index renvoyé par la carte 
        $idcard = $cartes[$index]->getIdcard();             // On récupère l'idcard associé à l'index
        $cartes[$index]->setState(true);                    // On passe l'état de la carte sur true (face)
        echo "Index : " . $index."<br>";
        echo "idCard : " . $idcard."<br>";

        if($_SESSION['countTry'] < 2){                  // On stocke l'index et l'idcard de la première carte retournée, pour la comparer à la seconde
            $_SESSION['idcard'] = $idcard;
            $_SESSION['index'] = $index;
        }
        var_dump($_SESSION['idcard']);
        var_dump($_SESSION['index']);

        if($_SESSION['countTry'] == 2){                 // Quand 2 cartes sont retournées, on compare leurs index et leur idcard
            if($index != $_SESSION['index'] && $idcard == $_SESSION['idcard']){     // Si elles sont identiques c'est gagné, on les laisse sur true
                echo "Paire trouvée !" . '<br>';
                $_SESSION['pairs'][]= $index;
                $_SESSION['pairs'][]= $_SESSION['index'];
                
            }
        }
        

        if($_SESSION['countTry'] > 2){                          // Si le compteur atteind 2
            $_SESSION['countTry'] = 0;   
            for($i=0; $i<=5; $i++){
                echo "<br>";
                
                foreach($_SESSION['pairs'] as $pair){
                    if($i == $pair){
                        $cartes[$i]->setState(false);
                    }
                }
            }

            

            

        }
        echo "Cartes retournées : ".$_SESSION['countTry']."<br>";
        var_dump($_SESSION['pairs']);

        
        
            
        
        //var_dump($_SESSION['pairs']);
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