<?php

    /***
     * const.php 09/16/2017
     * Contain all parameters : database, constant, return codes, existing pages...
     ***/
    
    /* PATH */
    define('DS', '/'); //DIRECTORY_SEPARATOR
    define('ROOT', dirname(dirname(__FILE__)));
   

    /* DATABASE ACCESS */
    define('CONST_DB_HOST', "localhost");
    define('CONST_DB_NAME', "ecommerce");
    define('CONST_DB_USER', "root");
    define('CONST_DB_PASS', "root");

    /* PARAMETERS */
    define('SHOW_ERRORS', true);
    define('DEFAULT_PAGE', 'home');
    define('TIMEOUT_CONNEXION', 2592000);
    define('TIMEOUT_MOBILE_SESSION', 3600);
    define('NB_ELEMENT_PAGE', 10);
    define('MINIMAL_PASSWORD_SIZE', 6);

    /* STRINGS */
    define('DEFAULT_PAGE_NAME', '');
    define('DEFAULT_DESCRIPTION', '');
    define('KEYWORDS_DEFAUTS', '');
    define('DEFAULT_TITLE', 'Ecommerce');

    /* PATH  */
    define('ADRESSE_ABSOLUE_URL', 'http://localhost:8098/database_system_ecommerce_project/workspace/');

    define('BOOTSTRAP_CSS', ADRESSE_ABSOLUE_URL . 'view/css/bootstrap.min.css');
    define('BOOTSTRAP_JS', ADRESSE_ABSOLUE_URL . 'view/js/bootstrap.min.js');
    define('STYLE_CSS', ADRESSE_ABSOLUE_URL . 'view/css/style.css');
    define('IMAGES_STYLE', ADRESSE_ABSOLUE_URL .  'view/images/');
    
    define('FAVICON', ADRESSE_ABSOLUE_URL . 'view/images/favicon.ico');

    /* CONFIGURATION FILES INCLUDES */
    require_once('existing_pages.php');
    require_once('upload_file_config.php');
    require_once('return_codes.php');
    
?>