<?php

/* 
 * Author Kristen VIGUIER
 * Copyright 2017 Kristen VIGUIER.
 */

class m_cart {
    
    private $database;
            
    public function __construct($database) {
        $this->database = $database;
    }
    
    /*
     * Count the article store in Cart by idcustomer and id article
     */
    public function count_cart_article($idCustomer, $idArticle) {
        $count_cart_article = $this->database->prepare('SELECT quantity AS quantity FROM cart WHERE idCustomer = ? AND idArticle = ?');

        $count_cart_article->bindValue(1, $idCustomer, PDO::PARAM_INT);
        $count_cart_article->bindValue(2, $idArticle, PDO::PARAM_INT);
        $count_cart_article->execute();

        $return = $count_cart_article->fetch(PDO::FETCH_OBJ);
        $count_cart_article->closeCursor();

        return $return;
    }
    
    /*
     * Delete a cart by its IDs.
     */
    public function delete_cart($idCustomer, $idArticle) {
        $delete_cart = $this->database->prepare('DELETE FROM cart WHERE idCustomer = ? AND idArticle = ?');
        $delete_cart->bindValue(1, $idCustomer, PDO::PARAM_INT);
        $delete_cart->bindValue(2, $idArticle, PDO::PARAM_INT);
        return $delete_order->execute();
    }

    /*
     * Add a cart type with given param.
     */
    public function add_cart($idCustomer, $idArticle, $quantity, $reg_date){
        $add_cart = $this->database->prepare('INSERT INTO cart (idCustomer, idArticle, quantity, reg_date) 
        values (?, ?, ?, ?) ');

        $add_cart->bindValue(1, $idCustomer, PDO::PARAM_INT);
        $add_cart->bindValue(2, $idArticle, PDO::PARAM_INT);
        $add_cart->bindValue(3, $quantity, PDO::PARAM_INT);
        $add_cart->bindValue(4, $reg_date, PDO::PARAM_STR);

        return $add_cart->execute();
    }
    
    /*
     * Update a cart.
     */
    public function update_cart($idCustomer, $idArticle, $quantity, $reg_date){
        $update_cart = $this->database->prepare('UPDATE brand SET quantity = ?, reg_date = ? WHERE idCustomer = ?, idArticle = ?');

        $update_cart->bindValue(1, $quantity, PDO::PARAM_INT);
        $update_cart->bindValue(2, $reg_date, PDO::PARAM_STR);
        $update_cart->bindValue(3, $idCustomer, PDO::PARAM_INT);
        $update_cart->bindValue(4, $idArticle, PDO::PARAM_INT);

        // Return wheter true of false.
        return $update_cart->execute();
    } 
    
}
?>