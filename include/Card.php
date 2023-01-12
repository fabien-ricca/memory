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
        public function difficulty($a){
            for ($i = 1; $i <= $a; $i++) {                           // Boucle qui crée les index de 0 à 5
                for ($j = 1; $j <= $a/2; $j++) {                           // Et les idcard de 1 à 3
                    $card= new Card($i-1, $j, $state=false);                // On crée les objets
                    $cardListe[] = $card;                                   // On les stocke dans une liste
                    $i++;
                }
                $i--;
            }

            shuffle($cardListe);                                    // On mélange la liste d'objets
            $_SESSION['board'] = $cardListe;                      
            $_SESSION['countTry'] = 0;                              // On initie un compteur pour limiter le nombre de cartes retournées à 2 
            $_SESSION['score'] = 0;                                 // On initie le compteur du score
            $_SESSION['pairs'] = array();                           // On crée la liste pour stockée les paires trouvées
            $_SESSION['difficulté'] = $a;
        }

        // METHODE POUR MODIFIER L'ETAT DE LA CARTE
        public function setState($bol){
            $this->state = $bol;                                        // Selon son état, on retourne le recto ou le verso
            if($this->state == false){
                $this->display = "<img src='images/card/back-card.png'>";
            }
            if($this->state == true){
                $this->display = "<img src='images/card/img".$this->idCard.".jpg'>";
            }
        }

        // METHODE POUR RECUPERER L'INDEX
        public function getIndex(){
            return $this->index;
        }

        // METHODE POUR RECUPERER L'IDCARD
        public function getIdCard(){
            return $this->idCard;
        }

        // METHODE POUR RECUPERER L'ETAT
        public function getState(){
            return $this->state;
        }

        // METHODE POUR RECUPERER LE DISPLAY
        public function getDisplay(){
            if($this->state == false){
                $this->display = "<img src='images/card/back-card.png'>";
            }
            if($this->state == true){
                $this->display = "<img src='images/card/img".$this->idCard.".jpg'>";
            }
            return $this->display;
        }

    }

    
?>