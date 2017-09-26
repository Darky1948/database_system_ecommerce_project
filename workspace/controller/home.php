<?php
    /**** SESSION ****/
    session_start();

    /**** CONTROLLERS ****/
    require_once('class/c_session.php');
    require_once('class/t_text.php');
    require_once('class/c_user.php');

    /**** MODELS ****/
    require_once('model/m_session.php');
    require_once('model/m_user.php');

    /**** OBJECTS ****/
    $t_text = new t_text();

    $m_session = new m_session($database);
    $m_user = new m_user($database);
    $c_session = new c_session($m_session, $t_text);
    $c_user = new c_user($m_user);

    /**** CHECKING SESSION ****/
    $c_session->session();
      
    $page_name = 'Home';
?>