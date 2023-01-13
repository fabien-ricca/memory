<?php

    class Score extends User{
        public $nbcoups;
        public $score;


        public function calculScore($nbrcoups, $nbrpairs){
            $this->score = ($nbrcoups / $nbrpairs) * 100;
        }

        public function getUserScore(){
            return $this->score;
        }

        public function getUserBestScore(){
            $iduser = $_SESSION['id'];
            $request = $this->connect->prepare("SELECT nbcoups, score, difficult FROM score WHERE iduser = ? ORDER BY score DESC"); 
            $request->execute([$iduser]);
            $score = $request->fetchAll(PDO::FETCH_ASSOC);
            return $score;
        }

        public function getBestScore(){
            $request = $this->connect->prepare("SELECT nbcoups, score, difficult FROM score ORDER BY score DESC"); 
            $request->execute([]);
            $score = $request->fetchAll(PDO::FETCH_ASSOC);
            return $score;
        }

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