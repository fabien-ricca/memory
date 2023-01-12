<?php 
    include 'include/User.php';
    include 'include/Card.php';
    session_start(); 
    
    
    
    
    $cartes = $_SESSION['cards'];
    //var_dump($cartes);
    var_dump($_SESSION['pairs']);
    
    
    
    if(isset($_POST['card'])){                          // Quand une carte est cliquée
        $_SESSION['countTry']++;                            // On incrémente le compeur (pour limiter le nombre de cartes retourées)
        
        
        
        foreach($cartes as $carte){
            //var_dump($carte);
            //var_dump($carte->getIndex(), $_POST['card']);
            $index = (int)$carte->getIndex();
            $idcard = (int)$carte->getIdCard();
            
            if($index == $_POST['card']){
                $carte->setState(true);
                break;
            }
        }
        
        //! ON REGARDE SI LA CARTE PRECEDENTE ET LA CARTE ACTUELLE SONT LES MÊMES
        if($_SESSION['countTry'] == 2){                 // Quand 2 cartes sont retournées, on compare leurs index et leur idcard
            if($index != $_SESSION['index'] && $idcard == $_SESSION['idcard']){     // Si elles sont identiques c'est gagné, on les laisse sur true
                echo "Paire trouvée !" . '<br>';
                $_SESSION['pairs'][] = $index;
                $_SESSION['pairs'][] = $_SESSION['index'];
            }
        }
        
        $_SESSION['idcard'] = $idcard;
        $_SESSION['index'] = $index;
        
        
        //! ON ENREGISTRE L'INDEX ET L'IDCARD DE LA 1ERE CARTE RETOURNEE
        /*if($_SESSION['countTry'] < 2){                  // On stocke l'index et l'idcard de la première carte retournée, pour la comparer à la seconde
            $_SESSION['idcard'] = $idcard;
            $_SESSION['index'] = $index;
        }*/
        
        echo "Index : " . $index."<br>";
        $a = var_dump($_SESSION['index']);
        echo "idCard : " . $idcard."<br>";
        $b = var_dump($_SESSION['idcard']);
        
        
        
        
        
        //! AU 3EME CLIQUE ON VERIFIE POUR CHAQUE CARTE SI ELLE A ETE TROUVE OU NON
        if($_SESSION['countTry'] > 2){                          // Si le compteur dépasse 2
            $_SESSION['countTry'] = 0;  
            
            if(count($_SESSION['pairs']) != 0){
                
                foreach($_SESSION['pairs'] as $pair){
                    
                    foreach($cartes as $carte){
                        
                        $intIndex = (int)$carte->getIndex();
                        
                        if($intIndex != $pair){
                            echo $carte->getIndex() .' mon state est ' . ($carte->getState() ? 'true' : 'false') .'<br>';
                            $carte->setState(false);
                        }
                        
                        else{
                            echo $carte->getIndex() .' mon state est ' . ($carte->getState() ? 'true' : 'false') .'<br>';
                            $carte->setState(true);
                        }
                    }
                }
            }
            else{
                for($j=0; $j<=5; $j++){
                    $cartes[$j]->setState(false);
                    
                }
            }
        }
        
        echo "<br>Cartes retournées : ".$_SESSION['countTry']."<br>";
        //var_dump($cartes);
        
        if(count($_SESSION['pairs']) == 6){
            header('location: win.php');
            
            
        }
        //echo "ok";
        //sleep(5);
        //var_dump($_SESSION['idcard']);
    }
    
    var_dump($_SESSION);
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

                <?php for($i=0; isset($cartes[$i]); $i++){ 
                ?>
                    <button form="form-card" name="card" class="card-button" value="<?= $cartes[$i]->getIndex(); ?>"><?= $cartes[$i]->getDisplay(); ?></button>
                <?php }?>


                
        
                
            
            
        </main>

        <footer></footer>
    </body>

</html>