<?php include 'include/User.php';

    

    if(isset($_POST['card'])){
        $count++;
        echo $count;
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

            <button form="form-card" name="card" class="card-button"><img src="images/card/back-card.png" alt=""></button>
            
            <!-- <button form="form-card" name="card" class="card-button"><img src="images/card/back-card.png" alt=""></button>
            
            <button form="form-card" name="card" class="card-button"><img src="images/card/back-card.png" alt=""></button>
            
            <button form="form-card" name="card" class="card-button"><img src="images/card/back-card.png" alt=""></button>
            
            <button form="form-card" name="card" class="card-button"><img src="images/card/back-card.png" alt=""></button>
            
            <button form="form-card" name="card" class="card-button"><img src="images/card/back-card.png" alt=""></button>
            
            <button form="form-card" name="card" class="card-button"><img src="images/card/back-card.png" alt=""></button>
            
            <button form="form-card" name="card" class="card-button"><img src="images/card/back-card.png" alt=""></button>
            
            <button form="form-card" name="card" class="card-button"><img src="images/card/back-card.png" alt=""></button>
            
            <button form="form-card" name="card" class="card-button"><img src="images/card/back-card.png" alt=""></button>
            
            <button form="form-card" name="card" class="card-button"><img src="images/card/back-card.png" alt=""></button>
            
            <button form="form-card" name="card" class="card-button"><img src="images/card/back-card.png" alt=""></button> -->
        </main>

        <footer></footer>
    </body>

</html>