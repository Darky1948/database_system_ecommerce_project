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

    /**** MODELS ****/
    require_once('model/m_session.php');
    require_once('model/m_customer.php');
    require_once ('model/m_article.php');
    require_once ('model/m_articleType.php');
    require_once ('model/m_brand.php');
    require_once ('model/m_category.php');
    require_once ('model/m_media.php');

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

    /**** CHECKING SESSION ****/
    $c_session->session();

    $page_name = 'Article';


    /**** TREATMENT ***/
    
    
    /*
     * Getting the URL param and check if it's an ID.
     */
    if(!empty($url_param[0])) {
        if(preg_match('#^[0-9]{1,}$#', $url_param[0])) {
                $idArticle = $url_param[0];
        } else { header('Location: '.ADRESSE_ABSOLUE_URL.'error'); }
    } else { header('Location: '.ADRESSE_ABSOLUE_URL.'error'); }
    
    
    //Get the corresponding article
    $article = $m_article->get_article($idArticle);
?>

