<?php

/* 
 * Author Kristen VIGUIER
 * Copyright 2017 Kristen VIGUIER.
 */

class m_orders {
    
    private $database;
            
    public function __construct($database) {
        $this->database = $database;
    }
    
    /*
     * Get all the orders.
     */
    public function get_orders() {
        $get_orders = $this->database->prepare('SELECT * FROM orders');

        $get_orders->execute();

        $object = $get_orders->fetchAll(PDO::FETCH_OBJ);
        $get_orders->closeCursor();

        return $object;
    }

    /*
     * Get an order by its id.
     */
    public function get_order($idOrder){
        $get_order = $this->database->prepare('SELECT * FROM orders WHERE idOrder = ?');

        $get_order->bindValue(1, $idOrder, PDO::PARAM_INT);
        $get_order->execute();

        $retour = $get_order->fetch(PDO::FETCH_OBJ);
        $get_order->closeCursor();

        return $retour;
    }
    
    /*
     * Get an order by its customer id.
     */
    public function get_order_by_customer_id($idCustomer){
        $get_order_by_customer_id = $this->database->prepare('SELECT * FROM orders WHERE idCustomer = ?');

        $get_order_by_customer_id->bindValue(1, $idCustomer, PDO::PARAM_INT);
        $get_order_by_customer_id->execute();

        $retour = $get_order_by_customer_id->fetchAll(PDO::FETCH_OBJ);
        $get_order_by_customer_id->closeCursor();

        return $retour;
    }
    
        /*
     * Get an order by its customer and article id.
     */
    public function get_order_by_customer_article_ids($idCustomer, $idArticle){
        $get_order_by_customer_id = $this->database->prepare('SELECT * FROM orders WHERE idCustomer = ? AND idArticle = ?');

        $get_order_by_customer_id->bindValue(1, $idCustomer, PDO::PARAM_INT);
        $get_order_by_customer_id->bindValue(2, $idArticle, PDO::PARAM_INT);
        $get_order_by_customer_id->execute();

        $retour = $get_order_by_customer_id->fetch(PDO::FETCH_OBJ);
        $get_order_by_customer_id->closeCursor();

        return $retour;
    }
    
    /*
     * Update a order.
     */
    public function update_order($idOrder, $quantity, $Ordering_date, $idCustomer, $idArticle){
        $update_order = $this->database->prepare('UPDATE orders SET quantity = ?, Ordering_date = ?, idCustomer = ?, idArticle = ? WHERE idOrder = ?');

        $update_order->bindValue(1, $quantity, PDO::PARAM_INT);
        $update_order->bindValue(2, $Ordering_date, PDO::PARAM_STR);
        $update_order->bindValue(3, $idCustomer, PDO::PARAM_INT);
        $update_order->bindValue(4, $idOrder, PDO::PARAM_INT);
        $update_order->bindValue(5, $idArticle, PDO::PARAM_INT);

        // Return wheter true of false.
        return $update_order->execute();
    } 

    /*
     * Delete a order by its ID.
     */
    public function delete_order($idOrder){
        $delete_order = $this->database->prepare('DELETE FROM orders WHERE idOrder = ?');
        $delete_order->bindValue(1, $idOrder, PDO::PARAM_INT);
        return $delete_order->execute();
    }

    /*
     * Add a order type with given param.
     */
    public function add_order($quantity, $idCustomer, $idArticle){
        $add_order = $this->database->prepare('INSERT INTO orders (quantity, Ordering_date, idCustomer, idArticle) 
        values (?, CURRENT_TIMESTAMP, ?, ?) ');

        $add_order->bindValue(1, $quantity, PDO::PARAM_INT);
        $add_order->bindValue(2, $idCustomer, PDO::PARAM_INT);
        $add_order->bindValue(3, $idArticle, PDO::PARAM_INT);

        return $add_order->execute();
    }
    
}
?>