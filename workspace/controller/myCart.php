<?php
    /* 
     * Author Kristen VIGUIER
     * Copyright 2017 Kristen VIGUIER.
     */

    /**** SESSION ****/
    session_start();

    /**** CONTROLLERS ****/
    require_once('class/c_session.php');
    require_once('class/t_text.php');
    require_once('class/c_user.php');
    require_once('class/c_cart.php');

    /**** MODELS ****/
    require_once('model/m_session.php');
    require_once('model/m_customer.php');
    require_once('model/m_article.php');
    require_once('model/m_articleType.php');
    require_once('model/m_brand.php');
    require_once('model/m_category.php');
    require_once('model/m_media.php');
    require_once('model/m_comment.php');
    require_once('model/m_cart.php');
    
    /**** OBJECTS ****/
    $t_text = new t_text();

    $m_session = new m_session($database);
    $m_customer = new m_customer($database);
    $c_session = new c_session($m_session, $t_text);
    $c_user = new c_user($m_customer);

    $m_article = new m_article($database);
    $m_articleType = new m_articleType($database);
    $m_brand = new m_brand($database);
    $m_category = new m_category($database);
    $m_media = new m_media($database);
    $m_comment = new m_comment($database);
    
    $m_cart = new m_cart($database);
    $c_cart = new c_cart($m_article);

    /**** CHECKING SESSION ****/
    $c_session->session();

    $page_name = 'My Cart';
    
    if($_SESSION['id'] == -1) header('Location: home');

    /**** TREATMENT ***/      
    
    if(isset($_POST['delete']) && $_POST['idArticle']) {
        $return = $m_cart->delete_cart($_SESSION['id'], $_POST['idArticle']);
        
        $c_cart->deleteArticle($_POST['idArticle']);
        
        header('Location: '. ADRESSE_ABSOLUE_URL . 'myCart');
    }
   
?>