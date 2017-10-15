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
            $_SESSION['cart']['productLibelle'] = array();
            $_SESSION['cart']['productQuantity'] = array();
            $_SESSION['cart']['productPrice'] = array();
            $_SESSION['cart']['lock'] = false;
        }
        return true;
    }
    
    function addProduct($productLibelle, $productQuantity, $productPrice){
        //If the cart exist and that is not lock
        if ($this->creatingCart() && !$this->isLock()) {
            // If the product already exist we jsut add the quantity
            $productIndex = array_search($productLibelle,  $_SESSION['cart']['productLibelle']);

            if ($productIndex !== false) {
                $_SESSION['cart']['productQuantity'][$productIndex] += $productQuantity ;
            } else {
               //Sinon on ajoute le produit
               array_push( $_SESSION['cart']['productLibelle'],$productLibelle);
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
    function deleteArticle($productLibelle) {
        //If the cart exist and is not lock
        if ($this->creatingCart() && !$this->isLock()) {
            //We use a tmp cart
            $tmp=array();
            $tmp['productLibelle'] = array();
            $tmp['productQuantity'] = array();
            $tmp['productPrice'] = array();
            $tmp['lock'] = $_SESSION['cart']['Lock'];

           for($i = 0; $i < count($_SESSION['cart']['productLibelle']); $i++) {
                if ($_SESSION['cart']['productLibelle'][$i] !== $productLibelle) {
                   array_push( $tmp['productLibelle'],$_SESSION['cart']['productLibelle'][$i]);
                   array_push( $tmp['productQuantity'],$_SESSION['cart']['productQuantity'][$i]);
                   array_push( $tmp['productPrice'],$_SESSION['cart']['productPrice'][$i]);
                }

            }
            // We replace the cart in session by our tmp cart which is update
            $_SESSION['panier'] =  $tmp;
            //Just delete the tmp carte
            unset($tmp);
        } else {
            echo "An error occured please contact administrator.";
        }
    }
    
    /*
     * Update an article quantity.
     */
    function updateArticleQuantity($productLibelle, $productQuantity){
        //If the cart exist and is not lock
        if ($this->creatingCart() && !$this->isLock()) {
            // Wether the quantity is > 0 we update
            if ($productQuantity > 0) {
                //Search the product in the cart
                $index = array_search($productLibelle,  $_SESSION['cart']['productLibelle']);

                if ($index !== false) {
                   $_SESSION['cart']['productQuantity'][$index] = $productQuantity ;
                }
            } else {
                $this->deleteArticle($productLibelle);
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
        for($i = 0; $i < count($_SESSION['cart']['productLibelle']); $i++) {
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
            return count($_SESSION['cart']['productLibelle']);
        } else {
            return 0;
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