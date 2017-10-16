<?php
    class c_user {

        private $modele;

        public function __construct($p_modele){
                $this->modele = $p_modele;
        }

        public function connexion($adresse_email, $password) {
            if(!empty($adresse_email) AND !empty($password)) {
                $verification = $this->modele->connection($adresse_email, $password);
                if(!empty($verification)){
                    $_SESSION['id'] = $verification->idCustomer;
                    $_SESSION['time'] = time();
                    $_SESSION['email'] = $verification->email;
                    $_SESSION['firstname'] = $verification->firstname;
                    $_SESSION['lastname'] = $verification->lastname;
                    return 0;
                }else{
                    return 1;
                }
            } else { 
                return 2; 
            }
        }

        public function deconnexion() {
            setcookie('u', '', time()+1);
            setcookie('p', '', time()+1);

            $_SESSION['id'] = 0;
            session_destroy();
        }
    }
?>