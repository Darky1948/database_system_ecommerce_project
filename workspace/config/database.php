<?php

    /***
     * database.php 09/16/2017
     * Connect to the MYSQL database.
     ***/

    try {	
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        /* If we need to specify the PORT, uncommented below and remove the other one below the line commented */
        //$base_de_donnee = new PDO('mysql:host='.CONST_DB_HOST.';port='.CONST_DB_PORT.';dbname='.CONST_DB_NAME, CONST_DB_USER, CONST_DB_PASS, $pdo_options);
        $database = new PDO('mysql:host='.CONST_DB_HOST.';dbname='.CONST_DB_NAME, CONST_DB_USER, CONST_DB_PASS, $pdo_options);
        $database->exec('SET NAMES utf8');
    } catch(Exception $e) {
        $_GET['url'] = 'error';
        $error_message = "Unable to connect to the database. Contact an administrator.";
    }	
?>