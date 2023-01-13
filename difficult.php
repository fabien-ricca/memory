<?php 
    include 'include/User.php';
    include 'include/Card.php';
    session_start(); 

    
    $nbrcards = 0;


    if(isset($_POST['facile'])){
        $_SESSION['difficult'] = 6;
        $card = new Card($index = NULL, $idCard = NULL, $state = false);
        $card->difficulty($_SESSION['difficult']);
        header('location: jeu.php');
    }

    if(isset($_POST['intermediaire'])){
        $_SESSION['difficult'] = 12;
        $card = new Card($index = NULL, $idCard = NULL, $state = false);
        $card->difficulty($_SESSION['difficult']);
        header('location: jeu.php');
    }

    if(isset($_POST['difficile'])){
        $_SESSION['difficult'] = 24;
        $card = new Card($index = NULL, $idCard = NULL, $state = false);
        $card->difficulty($_SESSION['difficult']);
        header('location: jeu.php');
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

    <body class="wall4">
        <?php include 'include/header.php' ?>

        <main>
            <div  class="flex-column" id="difficult-container">
                <form method="post" class="flex-column">
                    <input class="scale" type="submit" name="facile" value="facile" id="facile"><br>
                    <input class="scale" type="submit" name="intermediaire" value="intermediaire" id="inter"><br>
                    <input class="scale" type="submit" name="difficile" value="difficile" id="diff"><br>
                </form>
            </div>
        </main>

        <footer></footer>
    </body>

</html>