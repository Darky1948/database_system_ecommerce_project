<?php
    /* 
     * Author Kristen VIGUIER
     * Copyright 2017 Kristen VIGUIER.
     */

    /**** SESSION ****/
    session_start();

    /**** CONTROLLER CLASS ****/
    require_once('class/c_session.php');
    require_once('class/t_text.php');
    require_once('class/c_user.php');
    require_once('class/f_formulaire.php');

    /**** MODELE ****/
    require_once('model/m_session.php');
    require_once('model/m_customer.php');

    /**** OBJETS ****/
    $t_text = new t_text();
    $f_formulaire = new f_formulaire();
    $m_session = new m_session($database);
    $c_session = new c_session($m_session, $t_text);
    $m_customer = new m_customer($database);
    $c_user = new c_user($m_customer);

    // Attribution de la session
    $c_session->session();
    
    // Already connected
     
    $return = -1;
   
    if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['subject']) && isset($_POST['message'])) {
        echo 'Sorry ! Not implemented';
    }
?>