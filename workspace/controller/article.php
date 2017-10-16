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
    
    
    /*
     * Handle the add cart action
     */  
    $return = -1;
    
    if(count($_POST) > 0) {
        if(isset($_POST['quantity']) && isset($_POST['idArticle'])) {
            // Is it connected ?
            if($_SESSION['id'] == -1) {
               $return = 3;
            }else {
                $quantity = $_POST['quantity'];
                $articleForm = $m_article->get_article($idArticle);


                if($c_cart->creatingCart()) {
                    // Vérifie si on a déjà cet article et si c'est le cas comtpé combien on a déjà.
                }

                // First basical check
                if($quantity > 0 && $quantity <= $articleForm->quantity && $idArticle == $_POST['idArticle']) {
                    $cartQuantity = $m_cart->count_cart_article($_SESSION['id'], $idArticle);

                    $realAvailableStock = $articleForm->quantity - $cartQuantity;

                    // That means there is enough stock
                    if($quantity <= $realAvailableStock) {
                        // Creating the cart
                        $c_cart->creatingCart();

                        // Adding a product to our cart
                        $c_cart->addProduct($articleForm->idArticle, $quantity, $articleForm->price);

                        header('Location: '.ADRESSE_ABSOLUE_URL.'myCart');
                    }
                }else {
                    $return = 5;
                }
            } 
        } elseif (isset($_POST['message'])) { // If there is a comment that is posted
            var_dump($_SESSION);
            $message = htmlspecialchars(trim($_POST['message']));
            $articleForm = $m_article->get_article($idArticle);
            $idCustomer = $_SESSION['id'];
            
            $execution = $m_comment->add_comment($message, $articleForm->idArticle, $idCustomer);
            header('Location: '.ADRESSE_ABSOLUE_URL.'article/' . $articleForm->idArticle);
        } else {
            $return = 4;
        }
    }

?>

