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

    <body class="wall2">
        <?php include 'include/header.php' ?>

        <main class="flex-column">
            <h2>Bienvenue sur votre profil, <?= $user->getLogin() ?></h2>
            <h3>Vos meilleurs scores</h3>
                <section>
                        <table id="score">
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
                                        for($i=0; isset($data[$i]); $i++){
                                            if($i<10){?>
                                            <tr>
                                                <td><?= $data[$i]['nbcoups'] ?></td>
                                                <td><?= $data[$i]['score'] ?></td>
                                                <td><?= $data[$i]['difficult'] ?></td>
                                            </tr>
                                    <?php }} ?>  
                            </tbody>
                        </table>
                </section>

            <h3>Modifier vos informations</h3>
            <section>
                <form action="" Method="POST" class="flex-column" id="form-update">
                    <label for="login">Nom d'utilisateur</label>
                    <input type="text" id="login" name="login" placeholder="Min. 5 caractères"  value="<?= $user->getLogin() ?>" placeholder="<?= $user->getLogin() ?>">

                    <label for="oldpassword">Ancien mdp</label>
                    <input type="password" id="oldpassword" name="oldpassword" value="Bonjour@123" placeholder="Bonjour@123">

                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password">

                    <label for="confpassword">Confirmation</label>
                    <input type="password" id="confpassword" name="confpassword"">

                    <input type="submit" id="mybutton-update" value="Modifier" ><br><br>
                </form>
            </section>
        </main>
    </body>
</html>