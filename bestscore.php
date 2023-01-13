<?php 
    include 'include/User.php';
    include 'include/Card.php';
    include 'include/Game.php';
    include 'include/Score.php';
    session_start(); 
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Cormorant:wght@700&family=Rubik&family=Signika&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Mon profil</title>
    </head>

    <body class="wall5">
        <?php include 'include/header.php' ?>

        <main class="flex-column">
            <h2>Best Scores Ever</h2>
            <section class="flex center" id="scorecontainer">
                <table id="bestscore">
                    <thead>
                        <tr>
                            <th>Class.</th>
                            <th>Joueur</th>
                            <th>Nb coups</th>
                            <th>Score</th>
                            <th>Difficulté</th>
                        </tr>
                    </thead>

                    <tbody>
                            <?php 
                                $score = new Score();
                                $data = $score->getBestScore();
                                for($i=0; isset($data[$i]); $i++){
                                    if($i<10){?>
                                    <tr>
                                        <th><?= $i+1 ?></th>
                                        <td><?= $user->getOtherLogin($data[$i]['iduser']) ?></td>
                                        <td><?= $data[$i]['nbcoups'] ?></td>
                                        <td><?= $data[$i]['score'] ?></td>
                                        <td><?= $data[$i]['difficult'] ?></td>
                                    </tr>
                            <?php }} ?>  
                    </tbody>
                </table>
            </section>
        </main>
    </body>
</html>