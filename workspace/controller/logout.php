<?php
    /**** SESSION ****/
    session_start();

    /**** CLASS CONTROLEUR ****/
    require_once('class/t_text.php');

    require_once('class/c_session.php');
    require_once('class/c_user.php');

    /**** MODELE ****/
    require_once('model/m_session.php');
    require_once('model/m_customer.php');

    /**** OBJETS ****/
    $t_text = new t_text();
    $m_session = new m_session($database);
    $c_session = new c_session($m_session, $t_text);

    $m_customer = new m_customer($database);
    $c_user = new c_user($m_customer);

    /**** VERIF SESSION ****/
    $c_session->session();

    //if($_SESSION['id'] == -1) header('Location: connexion');

    $c_user->deconnexion();

    $page_name = 'Déconnexion - '.DEFAULT_PAGE_NAME;
?>