<?php 
    include 'include/User.php';
    session_start(); 
    
    $msg ="";

    if ($_POST != NULL){
        $login = htmlspecialchars(trim($_POST['login']));
        $password = htmlspecialchars(trim($_POST['password']));
        $confPassword = htmlspecialchars(trim($_POST['confPassword']));

        if ($password == $confPassword){
            if ($user->checkPassword($password, $confPassword)){
                $msg = $user->register($login, $password);
            }
            else{
                $msg = "<p id='msgerror'>" . '!! Le mot de passe doit contenir au moins 8 caractères dont<br>
                1 lettre majuscule, 1 lettre minuscule, <br>1 caractère spéciale et 1 chiffre!!' . '</p>';
            }
        }
        else{
            $msg = "<p id='msgerror'>" .'!! Les mots de passes ne sont pas identiques !!' . '</p>';
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
        <title>Je m'inscris</title>
    </head>

    <body class="wall1">
        <?php include 'include/header.php' ?>

        <main class="flex-column">
            <section class="container">
                <form action="" Method="POST" class="flex-column form">
                    <label for="login">Nom d'utilisateur</label>
                    <input type="text" id="login" name="login" placeholder="Min. 5 caractères" require>

                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" name="password" value="" placeholder="" require>

                    <label for="confPassword">Confirmation</label>
                    <input type="password" id="confPassword" name="confPassword" value="" placeholder="" require>

                    <input type="submit" id="mybutton" value="Je m'inscris" >
                    
                    <?= $msg; ?>
                </form>
            </section>
        </main>

        <footer></footer>
    </body>

</html>