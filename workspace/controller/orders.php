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
    require_once('model/m_orders.php');
    require_once('model/m_article.php');
    require_once('model/m_articleType.php');
    require_once('model/m_brand.php');
    require_once('model/m_category.php');
    require_once('model/m_media.php');
    
    /**** OBJETS ****/
    $t_text = new t_text();
    $f_formulaire = new f_formulaire();
    $m_session = new m_session($database);
    $c_session = new c_session($m_session, $t_text);
    $m_customer = new m_customer($database);
    $c_user = new c_user($m_customer);
    
    $m_article = new m_article($database);
    $m_articleType = new m_articleType($database);
    $m_brand = new m_brand($database);
    $m_category = new m_category($database);
    $m_media = new m_media($database);
    $m_orders = new m_orders($database);

    /**** TREATMENT ***/
    
    // Attribution de la session
    $c_session->session();
    
    // Already connected
    if($_SESSION['id'] == -1) header('Location: home');
    
    $return = -1;
    
    $orders = $m_orders->get_order_by_customer_id($_SESSION['id']);    
?>