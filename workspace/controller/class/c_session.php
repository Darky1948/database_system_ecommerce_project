<?php
class c_session{

    private $modele;
    private $texte;

    public function __construct($p_modele, $ptexte){
        $this->modele = $p_modele;
        $this->texte = $ptexte;
    }

    /* Vérifie la variable de session id */
    public function session(){
        if(!isset($_SESSION['id'])){
            $_SESSION['id'] = -1;
        }
    }

    /* SESSION TIME OUT */
    public function sesion_timeout(){
        $tempsActuel = time();

        if($tempsActuel - $_SESSION['time'] >= 600){
                header('Location: deconnexion');
        }
    }      
}
?>