<?php  if ($user->isConnected()){ ?>
            <header>
                <nav class="flex">
                    <a href="index.php">ACCUEIL</a>
                    <a href="profil.php">MON PROFIL</a>
                    <a href="bestscore.php">SCORE</a>
                    <a id="disconnect" href="deconnexion.php">DECONNEXION</a>
                </nav>
            </header>
<?php } else{ ?>
            <header>
                <nav class="flex">

                    <a href="index.php">ACCUEIL</a>
                    <a href="inscription.php">JE M'INSCRIS</a>
                    <a href="connexion.php">JE ME CONNECTE</a>
                    <a href="bestscore.php">SCORE</a>
                </nav>
            </header>
    <?php } ?>

