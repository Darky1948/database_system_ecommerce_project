<?php

/* 
 * Author Kristen VIGUIER
 * Copyright 2017 Kristen VIGUIER.
 */

class c_cart {
    
    private $modele;
    
    public function __construct($p_modele){
        $this->modele = $p_modele;
    }
    
    /*
     * Create our cart.
     */
    function creatingCart(){
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
            $_SESSION['cart']['productId'] = array();
            $_SESSION['cart']['productQuantity'] = array();
            $_SESSION['cart']['productPrice'] = array();
            $_SESSION['cart']['lock'] = false;
            $_SESSION['cart']['time'] = time();
        }
        return true;
    }
    
    function addProduct($productId, $productQuantity, $productPrice){
        //If the cart exist and that is not lock
        if ($this->creatingCart() && !$this->isLock()) {
            // If the product already exist we jsut add the quantity
            $productIndex = array_search($productId,  $_SESSION['cart']['productId']);

            if ($productIndex !== false) {
                $_SESSION['cart']['productQuantity'][$productIndex] += $productQuantity ;
            } else {
               //Sinon on ajoute le produit
               array_push( $_SESSION['cart']['productId'],$productId);
               array_push( $_SESSION['cart']['productQuantity'],$productQuantity);
               array_push( $_SESSION['cart']['productPrice'],$productPrice);
            }
        } else {
            echo "An error occured please contact administrator.";
        }
    }
    
    /*
     * Delete an article.
     */
    function deleteArticle($productId) {
        //If the cart exist and is not lock
        if ($this->creatingCart() && !$this->isLock()) {
            //We use a tmp cart
            $tmp=array();
            $tmp['productId'] = array();
            $tmp['productQuantity'] = array();
            $tmp['productPrice'] = array();
            $tmp['lock'] = $_SESSION['cart']['lock'];

           for($i = 0; $i < count($_SESSION['cart']['productId']); $i++) {
                if ($_SESSION['cart']['productId'][$i] !== $productId) {
                   array_push( $tmp['productId'],$_SESSION['cart']['productId'][$i]);
                   array_push( $tmp['productQuantity'],$_SESSION['cart']['productQuantity'][$i]);
                   array_push( $tmp['productPrice'],$_SESSION['cart']['productPrice'][$i]);
                }

            }
            // We replace the cart in session by our tmp cart which is update
            $_SESSION['cart'] =  $tmp;
            //Just delete the tmp carte
            unset($tmp);
        } else {
            echo "An error occured please contact administrator.";
        }
    }
    
    /*
     * Update an article quantity.
     */
    function updateArticleQuantity($productId, $productQuantity){
        //If the cart exist and is not lock
        if ($this->creatingCart() && !$this->isLock()) {
            // Wether the quantity is > 0 we update
            if ($productQuantity > 0) {
                //Search the product in the cart
                $index = array_search($productId,  $_SESSION['cart']['productId']);

                if ($index !== false) {
                   $_SESSION['cart']['productQuantity'][$index] = $productQuantity ;
                }
            } else {
                $this->deleteArticle($productId);
            }
        } else {
            echo "An error occured please contact administrator.";
        }
    }
        
    /*
     * Compute the globalAmount
     */
    function globalAmount(){
        $amount=0;
        for($i = 0; $i < count($_SESSION['cart']['productId']); $i++) {
           $amount += $_SESSION['cart']['productQuantity'][$i] * $_SESSION['cart']['productPrice'][$i];
        }
        return $amount;
    }
    /*
     * If the cart is in checkout or not
     */
    function isLock(){
        if (isset($_SESSION['cart']) && $_SESSION['cart']['lock']) {
            return true;
        } else {
            return false;
        }
    }
    
    /*
     * Count the articles inside the cart
     */
    function countArticles() {
        if (isset($_SESSION['cart'])) {
            return count($_SESSION['cart']['productId']);
        } else {
            return 0;
        }
    }
    
    /*
     * Return the quantity of a specified article
     */
    function quantityArticle($productId) {
        //If the cart exist and is not lock
        if ($this->creatingCart() && !$this->isLock()) {
            //Search the product in the cart
            $index = array_search($productId,  $_SESSION['cart']['productId']);

            if ($index !== false) {
               return $_SESSION['cart']['productQuantity'][$index];
            }

        } else {
            echo "An error occured please contact administrator.";
        }
    }
    
    /*
     * Delete the cart
     */
    function deleteCart(){
        unset($_SESSION['cart']);
    }
}
?>