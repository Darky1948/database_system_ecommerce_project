<?php
    /* 
    * Author Kristen VIGUIER
    * Copyright 2017 Kristen VIGUIER.
    */

    /***
     * This is the entry point on the website.
     * Contains parameters files.
     * Thanks to it we can do MVC and call controllers and views depend on the page that is asked by the client.
     ***/
    
    /* This allow to compute the page loading */
    $t0 = microtime();

    /* Some configuration things */
    require_once('config/const.php');
    require_once('config/database.php');

    /* If we show errors or not (Mode developper or produce) */
    if(SHOW_ERRORS){
            error_reporting(E_ALL);
            ini_set('display_errors','On');
    } else {
            error_reporting(E_ALL);
            ini_set('display_errors','Off');
    }

    // If an URL exist
    if(isset($_GET['url'])){
            $url = $_GET['url'];
    } else {
            $url = '';
    }

    /* Security against injections */
    $global = array('_GET', '_POST', '_COOKIE');
    foreach($global as $value){
            foreach($GLOBALS[$value] as $key => $val){
                    if(is_array($val)){
                            foreach ($val as $keyVal => $value) {
                                    $val[$keyVal] = stripslashes($value);
                            }
                    }else{
                            $GLOBALS[$key] = stripslashes($val);
                    }
            }
    }

    /* Parsing URL */
    $page = DEFAULT_PAGE;
    $url_param = '';

    $urlArray = explode(DS, $url, 2);// explode a string in DS segment -> directory separator "/"

    // IF the URL array exist and it's not null then we got a page
    if(isset($urlArray[0]) && !empty($urlArray[0])) $page = $urlArray[0]; 
    // IF param exist and not null then we have some parameters
    if(isset($urlArray[1]) && !empty($urlArray[1])) $url_param = $urlArray[1]; 


    if(!in_array($page, $existing_pages) && !in_array($page, $existing_web_services)){
            $page = 'error';
            $error_message = 'Oups... The page that you\'re looking for doesn\'t exist';
    }

    /* Forming GET */
    $url_param = explode('/', $url_param);

    /* Page name by default */
    $page_name = DEFAULT_PAGE_NAME;
    $meta_description = DEFAULT_DESCRIPTION;
    $meta_keywords = KEYWORDS_DEFAUTS;

    
    /* Call of controller and views */
    if (file_exists('controller/'.$page.'.php') && file_exists('view/'.$page.'.php') && in_array($page, $existing_pages)){
        include('controller/'.$page.'.php');
        include('view/header.php');
        include('view/'.$page.'.php');
        include('view/footer.php');
    }else if(file_exists('webservices/'.$page.'.php') && in_array($page, $existing_web_services)){
    	include('webservices/'.$page.'.php');
    }else{ /* ERROR CASE */
        include('controller/erreur.php');
        include('view/header.php');
        include('view/erreur.php');
        include('view/footer.php');
    }

    /* Showing page time generation*/
    $t1 = microtime();
    echo '<!-- page generated in '.($t1 - $t0).' secondes -->';
?>