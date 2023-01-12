<?php 
    include 'include/User.php';
    include 'include/Card.php';
    include 'include/Game.php';
    session_start(); 
    
    $cards = $_SESSION['board'];
    
    $win = false;
    
    /*if(isset($_POST['card'])){
        $_SESSION['score']++;                           // On incrémente le score
        $_SESSION['countTry']++;                        // On incrémente le compeur (pour limiter le nombre de cartes retourées)
        
        
        //! ON RETOURNE LA CARTE CLIQUEE
        foreach($board as $card){                       // On récupère l'index et l'idcard de la carte cliquée et on la retourne
            $index = (int)$card->getIndex();
            $idcard = (int)$card->getIdCard();
            
            if($index == $_POST['card']){
                $card->setState(true);
                echo "ok";
                break;
            }
        }
        

        //! ON REGARDE SI LA CARTE PRECEDENTE ET LA CARTE ACTUELLE SONT LES MÊMES
        if($_SESSION['countTry'] == 2){                 // Quand 2 cartes sont retournées
            if($index != $_SESSION['index'] && $idcard == $_SESSION['idcard']){     // Si elles sont identiques c'est gagné, on les laisse sur true
                $_SESSION['pairs'][] = $index;                                      // Et on stocke leurs index dans la liste des paires trouvées
                $_SESSION['pairs'][] = $_SESSION['index'];
            }
        }
        
        $_SESSION['idcard'] = $idcard;                  // On stocke en session l'index et l'id de la carte retournée pour la comparer avec la prochaine
        $_SESSION['index'] = $index;


        //! AU 3EME CLIQUE ON VERIFIE POUR CHAQUE CARTE SI ELLE A ETE TROUVE OU NON
        if($_SESSION['countTry'] > 2){                          // Quand on retourne la 3eme carte
            $_SESSION['countTry'] = 1;                          // On redéfinit le compteur sur 1
            
            if(count($_SESSION['pairs']) != 0){                         // Si des paires ont déjà été trouvées
                    foreach($board as $carte){                              // On parcour les cartes du plateau 
                        
                        $intIndex = (int)$carte->getIndex();                
                        if(in_array($intIndex, $_SESSION['pairs'])){        // Si elles sont présentes dans la liste des paires trouvées on les laisse visible
                            $carte->setState(true);                             
                        }
                        else{                                               // Sinon on les retourne
                            $carte->setState(false);
                        }
                    }
                }
            else{                                               // Si aucune paire n'a été trouvé, on retourne toutes les cartes
                for($j=0; $j<=5; $j++){
                    $board[$j]->setState(false);
                }
            }

            foreach($board as $card){                          // On retourne la 3eme carte cliquée
                $index = (int)$card->getIndex();
                $idcard = (int)$card->getIdCard();
                
                if($index == $_POST['card']){
                    $card->setState(true);
                    break;
                }
            }

        }
        
        echo "<br>Cartes retournées : ".$_SESSION['countTry']."<br>";
        
        if(count($_SESSION['pairs']) == 6){
            //header('location: win.php');
            echo "Votre score : ".$_SESSION['score'];
        }
    }*/

    if(isset($_POST['card'])){
        $post = $_POST['card'];
        $board = new Game();
        $board->game($post);

        $card = new Card($index = NULL, $idCard = NULL, $state = false);
        if($board->win()){
            $win = true;
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
            <form id="form-card" method="post"></form>

                <?php for($i=0; isset($cards[$i]); $i++){ ?>
                    <button form="form-card" name="card" class="card-button" value="<?= $cards[$i]->getIndex(); ?>"><?= $cards[$i]->getDisplay(); ?></button>
                <?php }?>

                <?php if($win){echo "<br>C'est gagné !! Votre score : ".$_SESSION['score'];} ?>
        
                
            
            
        </main>

        <footer></footer>
    </body>

</html>