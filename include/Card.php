<?php

    class Card{
        public $index;
        public $idCard;
        public $state;
        public $display;

        // METHODE CONSTRUCT
        public function __construct($index, $idCard){
            $this->index = $index;
            $this->idCard = $idCard;
            $this->state = false;
            $this->display = "<img src='images/card/back-card.png'>";
        }

        // METHODE POUR CREER LES OBJETS SELON LA DIFFICULTE
        public function difficulty(){
                for($i=1; $i<=2; $i++){
                    for($j=1; $j<=3; $j++){
                        $card= new Card($i, $j);
                        $cardListe[] = $card; 
                    }
                }
                shuffle($cardListe);
                $_SESSION['cards'] = $cardListe;
        }

        public function setState($bol){
            $this->state = $bol;
            if($this->state == true){
                $this->display = "<img src='images/card/img".$this->idCard.".jpg'>";
            }   

        }

        public function getIndex(){
            return $this->index;
        }

        public function getIdCard(){
            return $this->idCard;
        }

        public function getState(){
            return $this->state;
        }

        public function getDisplay(){
            return $this->display;
        }
    }

    
?>