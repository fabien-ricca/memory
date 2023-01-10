<?php

    class Card{
        public $index;
        public $idCard;
        public $state;
        public $display;

        // METHODE CONSTRUCT
        public function __construct($index, $idCard, $state){
            $this->index = $index;
            $this->idCard = $idCard;
            $this->state = $state;

            
        }

        // METHODE POUR CREER LES OBJETS SELON LA DIFFICULTE
        public function difficulty(){
                for ($i = 1; $i <= 6; $i++) {                           // Boucle qui crée les index de 0 à 5
                    for ($j = 1; $j <= 3; $j++) {                           // Et les idcard de 1 à 3
                        $card= new Card($i-1, $j, $state=false);                // On crée les objets
                        $cardListe[] = $card;                                   // On les stocke dans une liste
                        $i++;
                    }
                    $i--;
                }

                //shuffle($cardListe);                                  // On mélange la liste d'objets
                $_SESSION['cards'] = $cardListe;                        // On initie un compteur pour limiter le nombre de cartes retournées à 2 //TODOO N'en garder qu'un seul en calculant le modulo.
                $_SESSION['countTry'] = 0;
        }

        public function setState($bol){
            $this->state = $bol; 
            if($this->state == false){
                $this->display = "<img src='images/card/back-card.png'>";
            }
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