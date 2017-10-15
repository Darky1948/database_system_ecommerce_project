<?php
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
    if($_SESSION['id'] != -1) header('Location: home');
     
    $return = -1;
    
    if(isset($_POST['email']) && isset($_POST['password'])) {
        $email = $f_formulaire->testInputData($_POST['email']);
        $password = $f_formulaire->testInputData($_POST['password']);

        $return = $c_user->connexion($email, $password);

        if($return == 0) { header('Location: ' . ADRESSE_ABSOLUE_URL . 'home');}
    }
?>