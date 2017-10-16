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
     * Get an product by its ids.
     */
    public function get_article($idCustomer, $idArticle){
        $get_article = $this->database->prepare('SELECT * FROM cart WHERE idCustomer = ? AND idArticle = ?');

        $get_article->bindValue(1, $idCustomer, PDO::PARAM_INT);
        $get_article->bindValue(2, $idArticle, PDO::PARAM_INT);
        $get_article->execute();

        $return = $get_article->fetch(PDO::FETCH_OBJ);
        $get_article->closeCursor();

        return $return;
    }
    
    /*
     * Count the article store in Cart by dcustomer for a given id article
     */
    public function count_cart_article($idArticle) {
        $count_cart_article = $this->database->prepare('SELECT quantity FROM cart WHERE idArticle = ?');

        $count_cart_article->bindValue(1, $idArticle, PDO::PARAM_INT);
        $count_cart_article->execute();

        $return = $count_cart_article->fetchAll(PDO::FETCH_OBJ);
        $count_cart_article->closeCursor();

        return $return;
    }
    
    /*
     * Delete a cart by its IDs.
     */
    public function delete_cart($idCustomer, $idArticle) {
        $this->database->beginTransaction();
        
        $delete_cart = $this->database->prepare('DELETE FROM cart WHERE idCustomer = ? AND idArticle = ?');
        $delete_cart->bindValue(1, $idCustomer, PDO::PARAM_INT);
        $delete_cart->bindValue(2, $idArticle, PDO::PARAM_INT);
        
        $return = $delete_cart->execute();
        $this->database->commit();
        return $return;
    }
    
    public function delete_cart_by_idCustomer($idCustomer) {
        $this->database->beginTransaction();
        
        $delete_cart_by_idCustomer = $this->database->prepare('DELETE FROM cart WHERE idCustomer = ?');
        $delete_cart_by_idCustomer->bindValue(1, $idCustomer, PDO::PARAM_INT);

        $return = $delete_cart_by_idCustomer->execute();
        $this->database->commit();
        return $return;
    }

    /*
     * Add a cart type with given param.
     */
    public function add_cart($idCustomer, $idArticle, $quantity){
        $this->database->beginTransaction();
  
        $add_cart = $this->database->prepare('INSERT INTO cart (idCustomer, idArticle, quantity, reg_date) 
        values (?, ?, ?, CURRENT_TIMESTAMP) ');

        $add_cart->bindValue(1, $idCustomer, PDO::PARAM_INT);
        $add_cart->bindValue(2, $idArticle, PDO::PARAM_INT);
        $add_cart->bindValue(3, $quantity, PDO::PARAM_INT);
        
        
        $return = $add_cart->execute();
        $this->database->commit();
        return $return;
    }
    
    /*
     * Update a cart.
     */
    public function update_cart($idCustomer, $idArticle, $quantity){
        $this->database->beginTransaction();
        
        $update_cart = $this->database->prepare('UPDATE cart SET quantity = ? WHERE idCustomer = ? AND idArticle = ?');

        $update_cart->bindValue(1, $quantity, PDO::PARAM_INT);
        $update_cart->bindValue(2, $idCustomer, PDO::PARAM_INT);
        $update_cart->bindValue(3, $idArticle, PDO::PARAM_INT);

        // Return wheter true of false.
        $return = $update_cart->execute();
        $this->database->commit();
        return $return;
    } 
    
}
?>