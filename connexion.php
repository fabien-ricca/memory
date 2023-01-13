<?php 
    include 'include/User.php';
    session_start(); 

    $msg = "";

    if ($_POST != NULL){
        $login = htmlspecialchars($_POST['login']);
        $password = htmlspecialchars($_POST['password']);

        $msg = $user->connect($login, $password);
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
        <title>Je me connecte</title>
    </head>

    <body class="wall1">
        <?php include 'include/header.php' ?>

        <main class="flex-column">
            <section class="container">
                <form action="" Method="POST" class="flex-column form">
                    <label for="login">Nom d'utilisateur</label>
                    <input type="text" id="login" name="login" placeholder="" value="" require>

                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" value="" placeholder="" require>

                    <input type="submit" id="mybutton" value="Je me connecte" >

                    <?= $msg; ?>
                </form>
            </section>
        </main>
    </body>
</html>