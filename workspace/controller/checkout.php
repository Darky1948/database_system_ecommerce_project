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
    require_once('model/m_orders.php');
    
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
    $m_orders = new m_orders($database);

    /**** CHECKING SESSION ****/
    $c_session->session();

    $page_name = 'My Cart';
    
    if($_SESSION['id'] == -1) header('Location: home');

    /**** TREATMENT ***/      
    $customer = $m_customer->get_customer($_SESSION['id']);
    
    
    $return = -1;
    
    if(count($_POST) > 0) {
        if(isset($_POST['country']) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['address']) && isset($_POST['city'])
                && isset($_POST['zip_code']) && isset($_POST['phone_number']) && isset($_POST['email_address']) && isset($_POST['CreditCardType']) && isset($_POST['car_number']) && isset($_POST['car_code'])) {
            // If they are notempty
            if(!empty($_POST['country']) && !empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['address']) && !empty($_POST['city'])
                && !empty($_POST['zip_code']) && !empty($_POST['phone_number']) && !empty($_POST['email_address']) && !empty($_POST['CreditCardType']) && !empty($_POST['car_number']) && !empty($_POST['car_code'])) {
                
                // We store the shipping adresse data inside our Session
                $_SESSION['shippingAdresse'] = array();
                $_SESSION['shippingAdresse']['country'] = $_POST['country'];
                $_SESSION['shippingAdresse']['first_name'] = $_POST['first_name'];
                $_SESSION['shippingAdresse']['last_name'] = $_POST['last_name'];
                $_SESSION['shippingAdresse']['address'] = $_POST['address'];
                $_SESSION['shippingAdresse']['city'] = $_POST['city'];
                $_SESSION['shippingAdresse']['zip_code'] = $_POST['zip_code'];
                $_SESSION['shippingAdresse']['phone_number'] = $_POST['phone_number'];
                $_SESSION['shippingAdresse']['email_address'] = $_POST['email_address'];
                $_SESSION['shippingAdresse']['CreditCardType'] = $_POST['CreditCardType'];
                $_SESSION['shippingAdresse']['car_number'] = $_POST['car_number'];
                $_SESSION['thanks'] = $_SESSION['cart'];
                
                // We update article table
                for($i = 0; $i < count($_SESSION['cart']['productId']); $i++) {
                   $idArticle = $_SESSION['cart']['productId'][$i];
                   $quantitySession = $_SESSION['cart']['productQuantity'][$i];
                   
                   $article = $m_article->get_article($idArticle);
                   
                   $quantityUpdated = $article->quantity - $quantitySession;
                   
                   // updating the stock of article
                   $m_article->update_article_quantity($idArticle, $quantityUpdated);
                   
                   // adding the customers orders
                   $m_orders->add_order($quantitySession, $_SESSION['id'], $idArticle);
                }
                
                // We empty the cart table
                $m_cart->delete_cart_by_idCustomer($_SESSION['id']);
                
                $c_cart->deleteCart();
                
                // redirect to the thanks page
                header('Location: '.ADRESSE_ABSOLUE_URL.'thanks/');
                
            }else {
                $return = 7;
            }
            
        }else {
            $return = 7;
        }
    }

?>