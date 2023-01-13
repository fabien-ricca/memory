<?php  // On ouvre la session
    class User {

        // ATTRIBUTS
        protected $connect;
        private $id;
        public $login;
        public $password;
        public $msg;

        // CONSTRUCTEUR
        public function __construct(){
            $this->connect = new PDO('mysql:host=localhost;dbname=memory', 'root', '');        // On connecte la base de donnée

            if($this->isConnected()){                               // Si un utilisateur est connecté
                $this->id = $_SESSION['id'];                        // On attribut les valeurs aux propriétés à partir des sessions
                $this->login = $_SESSION['login'];
                $this->password = $_SESSION['password'];
            }
        }  
        // METHODE POUR VERIFIER LA FORME DU MDP
        public function checkPassword($password){
            $password_regex = "/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";       // On créé la regex
            $check = false;     // On initie le check sur false

                // On vérifie que le mdp remplisse les conditions, si oui on passe check sur true   
                if(preg_match($password_regex, $password)){
                    $check = true;
                }
            return $check;      // On return check (true ou false)
            
        }

        // METHODE POUR INSCRIPTION
        public function register($login, $password){
            $request = $this->connect->prepare("SELECT login FROM utilisateurs WHERE login = ?"); 
                $request->execute([$login]);
                $count = $request->rowCount();

            if (strlen($login) >= 5){       // Si le login fait 5 caractères ou plus
                
                if ($count < 1){      // Si le login n'existe pas, on crypte le mdp, on créé l'user et on redirige vers connexion.php
                    $cryptPassword = password_hash($password, PASSWORD_BCRYPT);
                    $req = $this->connect->prepare ("INSERT INTO `utilisateurs` (`login`, `password`) VALUES (?, ?)");
                    $req->execute(array($login, $cryptPassword));
                    header("location: connexion.php");
                }

                else{       // Sinon message d'erreur
                    return  "<p id='msgerror'>" ."L'utilisateur {$login} existe déjà" . "</p>";
                }
            }

            else{           // Sinon message d'erreur
                return  "<p id='msgerror'>" .'Le login doit faire au minimum 5 caractères' . "</p>";
            }
            
        }

        // METHODE POUR CONNEXION
        public function connect($login, $password){
                $request = $this->connect->prepare("SELECT * FROM utilisateurs WHERE login = ?"); 
                $request->execute([$login]);
                $count = $request->rowCount();

            if($count == 1){                         // Si le login existe (s'il correspond)
                $data = $request->fetch(PDO::FETCH_ASSOC);
                var_dump($data);

                if (password_verify($password, $data['password'])){     // Si le mdp correspond
                    $_SESSION['id'] = $data['id'];
                    $_SESSION['login'] = $data['login'];
                    $_SESSION['password'] = $data['password'];

                    header("location: index.php");                    // On redirige vers la page d'accueil
                }
                else{       // Sinon message d'erreur
                    return  "<p id='msgerror'>" .'!! Identifiant ou mot de passe incorrect !!' . "</p>";
                }
            }
            else{       // Sinon message d'erreur
                return "<p id='msgerror'>" .'!! Identifiant ou mot de passe incorrect !!' . "</p>";
            }
        }

        // METHODE POUR DECONNEXION
        public function disConnect(){
            session_unset();
            session_destroy();                  // On détruit la session en cours
            var_dump($_SESSION);
            header("location: index.php");  // On redirige vers la page de connexion
        }

        // METHODE POUR VERIFIER SI UN USER EST CONNECTE
        public function isConnected(){
            if(isset($_SESSION['login'])){     // Si un attribut 'login' est stocké dans un objet 'user1' existe on return true (si un user est connecté)
                return true;
            }
        }

        // METHODE POUR UPDATE LES INFOS DE L'UTILISATEUR
        public function update($login, $oldPassword, $newPassword, $confNewPassword){
            $this->connect;
            $id = $_SESSION['id'];

            if (password_verify($oldPassword, $_SESSION['password'])){
                if ($newPassword == $confNewPassword){
                    if($this->checkPassword($newPassword)){
                        $cryptPassword = password_hash($newPassword, PASSWORD_BCRYPT);
                        $request = $this->connect->prepare("UPDATE `utilisateurs` SET password = ? WHERE id = ?"); 
                        $update = $request->execute(array($cryptPassword, $id));
                        $_SESSION['password'] = $cryptPassword;
                        header("location: profil.php");
                    }
                    else{
                        echo "!! Les nouveaux mot de passes ne sont pas identiques !!";
                    }
                }
            }
            else{       // Sinon message d'erreur
                echo "!! Le mot de passe actuel est incorrect !!";
            }

            // Si le login est différent
            if ($login != $_SESSION['login']){
                $request = $this->connect->prepare("SELECT * FROM utilisateurs WHERE login = ?"); 
                $request->execute([$login]);
                $count = $request->rowCount();

                // S'il n'existe pas
                if($count < 1){ 
                    $request = $this->connect->prepare("UPDATE `utilisateurs` SET login = ? WHERE id = ?"); 
                    $update = $request->execute(array($login, $id));
                    $_SESSION['login'] = $login;
                    header("location: profil.php");
                }
                else{       // Sinon message d'erreur
                    echo "L'utilisateur {$login} existe déjà.";
                }
            }
        }

        public function getMsg(){
            return $this->msg;
        }

        // METHODE POUR RECUPERER TOUTES LES INFOS DE L'UTILISATEUR CONNECTE
        public function getAllInfos(){
            /*$req = "SELECT * FROM `utilisateurs` WHERE login = '$login'"; // On initie la requête pour chercher le login
            $request = mysqli_query($this->connect, $req);
            $data = mysqli_fetch_assoc($request);
            return $data;*/
            return <<<HTML
                        <table>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Login</th>
                                </tr>
                            </thead>
                        
                            <tbody>
                                <tr>
                                    <td>{$_SESSION['id']}</td>
                                    <td>{$_SESSION['login']}</td>
                                </tr>
                            </tbody>
                        </table>
                    HTML;
        }

        // METHODE POUR RECUPERER LE LOGIN
        public function getLogin(){
            return $_SESSION['login'];
        }

        public function getOtherLogin($iduser){
            $request = $this->connect->prepare("SELECT login FROM utilisateurs WHERE id = ?"); 
            $request->execute([$iduser]);
            $data = $request->fetch(PDO::FETCH_ASSOC);
            return $data['login'];
        }
    }

    $user = new User();         // On lance une nouvelle instance de classe
?>