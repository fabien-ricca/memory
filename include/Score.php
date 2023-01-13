<?php
    // Classe héritière de User
    class Score extends User{
        public $nbcoups;
        public $score;


        // METHODE POUR CALCULER LE SCORE
        public function calculScore($nbrcoups, $nbrpairs){
            $this->score = ($nbrcoups / $nbrpairs) * 100;
        }

        // METHODE POUR RECUPERER LE SCORE DE L'USER CONNECTE
        public function getUserScore(){
            return $this->score;
        }

        // METHODE POUR RECUPERER LES MEILLEURS SCORES DE L'USER CONNECTE
        public function getUserBestScore(){
            $iduser = $_SESSION['id'];
            $request = $this->connect->prepare("SELECT nbcoups, score, difficult FROM score WHERE iduser = ? ORDER BY score DESC"); 
            $request->execute([$iduser]);
            $score = $request->fetchAll(PDO::FETCH_ASSOC);
            return $score;
        }

        // METHODE POUR RECUPERER LES MEILLEURS SCORES TOUS JOUEURS CONFONDUS
        public function getBestScore(){
            $request = $this->connect->prepare("SELECT iduser, nbcoups, score, difficult FROM score ORDER BY score DESC"); 
            $request->execute([]);
            $score = $request->fetchAll(PDO::FETCH_ASSOC);
            return $score;
        }

        // METHODE POUR ENVOYER LE SCORE EN BASE DE DONNEE
        public function pushScore($score){
            if($_SESSION['difficult'] == 6){
                $difficult = "Facile";
            }
            if($_SESSION['difficult'] == 12){
                $difficult = "Intermediaire";
            }
            if($_SESSION['difficult'] == 24){
                $difficult = "Difficile";
            }

            $req = $this->connect->prepare("INSERT INTO `score`(`iduser`, `nbcoups`, `score`, `difficult`) VALUES (?, ?, ?, ?)");
            $req->execute(array($_SESSION['id'], $_SESSION['nbrcoups'], $score, $difficult));
        }
    }

?>