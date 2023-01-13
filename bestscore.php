<?php 
    include 'include/User.php';
    include 'include/Card.php';
    include 'include/Game.php';
    include 'include/Score.php';
    session_start(); 

    $msgError = "";         //Création de la variable qui contiendra le message d'erreur du mdp

    if ($_POST != NULL){
        $login=htmlspecialchars($_POST['login']);
        $newPassword=htmlspecialchars($_POST['password']);  
        $confNewPassword=htmlspecialchars($_POST['confpassword']); 
        $oldPassword=htmlspecialchars($_POST['oldpassword']);  

        $user->update($login, $oldPassword, $newPassword, $confNewPassword);
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
        <title>Mon profil</title>
    </head>

    <body class="wall5">
        <?php include 'include/header.php' ?>

        <main class="flex-column">
            <h2>Best Scores Ever</h2>
                <section class="flex center" id="bestscore">
                    
                        <table>
                            <thead>
                                <tr>
                                    <th>Nb coups</th>
                                    <th>Score</th>
                                    <th>Difficulté</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                                    <?php 
                                        $score = new Score();
                                        $data = $score->getUserBestScore();
                                        //var_dump($data); 
                                        for($i=0; isset($data[$i])>= 10; $i++){
                                            //echo $data[$i]['difficult'].'<br>';?>
                                            <tr>
                                                <td><?= $data[$i]['nbcoups'] ?></td>
                                                <td><?= $data[$i]['score'] ?></td>
                                                <td><?= $data[$i]['difficult'] ?></td>
                                            </tr>
                                    <?php } ?>  
                            </tbody>
                        </table>


                </section>
        </main>

        <footer></footer>
    </body>

</html>