<?php
    // Classe héritière de Card
    class Game extends card{
        public $board;
        public $index;
        public $idcard;
        public $difficult;

        
        public function __construct(){
        }

        // METHODE POUR LA PREMIERE CARTE CLIQUEE
        public function firstCard($post){
            foreach($this->board as $card){                       // On récupère l'index et l'idcard de la carte cliquée et on la retourne
                $this->index = (int)$card->getIndex();
                $this->idcard = (int)$card->getIdCard();

                
                if($this->index == $post){
                    $card->setState(true);
                    break;
                }
            }
        }

        // METHODE QUAND 2 CARTES SONT RETOURNEES
        public function secondCard(){
            if($_SESSION['countTry'] == 2){                 // Quand 2 cartes sont retournées
                if($this->index != $_SESSION['index'] && $this->idcard == $_SESSION['idcard']){     // Si elles sont identiques c'est gagné, on les laisse sur true
                    if(in_array($this->index, $_SESSION['pairs']) && in_array($_SESSION['index'], $_SESSION['pairs'])){     // On vérifie si elles n'ont pas déjà été trouvées
                        echo"Dedans<br>";
                    }
                    else{                                        // Si non, on stocke leurs index dans la liste des paires trouvées
                        echo"Pas dedans<br>";
                        $_SESSION['pairs'][] = $this->index;
                        $_SESSION['pairs'][] = $_SESSION['index'];
                    }
                }
            }
            
            $_SESSION['idcard'] = $this->idcard;                  // On stocke en session l'index et l'id de la carte retournée pour la comparer avec la prochaine
            $_SESSION['index'] = $this->index;
        }

        // METHODE POUR LA 3EME CARTE RETOURNEE
        public function thirdCard($post){
            if($_SESSION['countTry'] > 2){                          // Quand on retourne la 3eme carte
                $_SESSION['countTry'] = 1;                          // On redéfinit le compteur sur 1
                
                if(count($_SESSION['pairs']) != 0){                         // Si des paires ont déjà été trouvées
                        foreach($this->board as $carte){                              // On parcourt les cartes du plateau 
                            
                            $intIndex = (int)$carte->getIndex();                
                            if(in_array($intIndex, $_SESSION['pairs'])){        // Si elles sont présentes dans la liste des paires trouvées on les laisse visible
                                $carte->setState(true);                             
                            }
                            else{                                               // Sinon on les retourne
                                $carte->setState(false);
                            }
                        }
                    }
                else{                                               // Si aucune paire n'a été trouvé, on retourne toutes les cartes
                    $diff = $_SESSION['difficult']-1;
                    for($j=0; $j<=$diff; $j++){
                        $this->board[$j]->setState(false);
                    }
                }   
            }
            $this->firstCard($post);                                // On refait appel à la méthode pour la 3° carte retournée
        }

        // METHODE POUR VERIFIER SI LA PARTIE EST GAGNEE
        public function win(){
            if(count($_SESSION['pairs']) == $_SESSION['difficult']){
                return true;
            }
        }

        // METHODE QUI LANCE LE JEU EN FAISANT APPEL AUX AUTRES METHODES
        public function game($post){
            $_SESSION['nbrcoups']++;                           // On incrémente le score
            $_SESSION['countTry']++;                        // On incrémente le compeur (pour limiter le nombre de cartes retourées)
            $this->board = $_SESSION['board'];
            
            $this->firstCard($post);
            $this->secondCard();
            $this->thirdCard($post);
        }
    }

    
?>