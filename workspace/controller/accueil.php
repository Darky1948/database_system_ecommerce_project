<?php
    /**** SESSION ****/
    session_start();

    /**** CONTROLLER CLASS ****/
    require_once('class/c_session.php');
    require_once('class/t_texte.php');
    require_once('class/c_utilisateur.php');

    /**** MODEL ****/
    require_once('model/m_session.php');
    require_once('model/m_utilisateur.php');

    /**** OBJECT ****/
    $t_texte = new t_texte();

    $m_session = new m_session($base_de_donnee);
    $m_utilisateur = new m_user($base_de_donnee);
    $c_session = new c_session($m_session, $t_texte);
    $c_utilisateur = new c_utilisateur($m_utilisateur);

    /**** VERIF SESSION ****/
    $c_session->session();
    
    if($_SESSION['id'] == -1) header('Location: connexion');
    
    $page_name = 'Accueil';
?>