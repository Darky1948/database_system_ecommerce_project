<?php

/* 
 * Author Kristen VIGUIER
 * Copyright 2017 Kristen VIGUIER.
 */
class m_customer {

    private $database;

    public function __construct($database){
            $this->database = $database;
    }

    /*
     * Connection
     */
    public function connection($email, $password){
        $connection = $this->database->prepare('SELECT * FROM customer WHERE email = ? AND password = ?');

        $connection->bindValue(1, $email, PDO::PARAM_STR);
        $connection->bindValue(2, hash('sha256', $password), PDO::PARAM_STR);
        $connection->execute();

        $object = $connection->fetch(PDO::FETCH_OBJ);
        $connection->closeCursor();

        return  $object;  
    }

    /*
     * Checking if this account already exist.
     */
    public function is_existing_account($email){
        $is_existing_account = $this->database->prepare('SELECT email FROM customer where email = ?');

        $is_existing_account->bindValue(1, $email, PDO::PARAM_STR);
        $is_existing_account->execute();

        $$object = $is_existing_account->fetch(PDO::FETCH_OBJ);
        $is_existing_account->closeCursor();

        return $$object;
    }

    /*
     * update an account for a given ID.
     */
    public function update_account($idCustomer, $lastname, $firstname, $adresse, $postalcode, $city, $country, $email, $phone, $password){
        $update_account = $this->database->prepare('UPDATE customer SET  lastname = ? , firstname = ? , adresse = ?, postalcode = ?, city = ?, country = ?, email = ?, phone = ?, password = ? WHERE idCustomer = ?');

        $update_account->bindValue(1, $lastname, PDO::PARAM_STR);
        $update_account->bindValue(2, $firstname, PDO::PARAM_STR);
        $update_account->bindValue(3, $adresse, PDO::PARAM_STR);
        $update_account->bindValue(4, $postalcode, PDO::PARAM_STR);
        $update_account->bindValue(5, $city, PDO::PARAM_STR);
        $update_account->bindValue(6, $country, PDO::PARAM_STR);
        $update_account->bindValue(7, $email, PDO::PARAM_STR);
        $update_account->bindValue(8, $phone, PDO::PARAM_STR);
        $update_account->bindValue(9, hash('sha256', $password), PDO::PARAM_STR);
        $update_account->bindValue(10, $idCustomer, PDO::PARAM_INT);
        $update_account->execute();

        return $update_account;
    }

    /*
     * Get customer information by id.
     */
    public function get_customer($id){
        $get_customer = $this->database->prepare('SELECT * FROM customer WHERE idCustomer = ?');

        $get_customer->bindValue(1, $id, PDO::PARAM_INT);
        $get_customer->execute();

        $object = $get_customer->fetch(PDO::FETCH_OBJ);
        $get_customer->closeCursor();

        return $object;
    }

    /*
     * create a new user.
     */
    public function create_user($lastname, $firstname, $adresse, $postalcode, $city, $country, $email, $phone, $password, $reg_date){
        $create_user = $this->database->prepare('INSERT INTO customer (lastname, firstname, adresse, postalcode, city, country, email, phone, password, reg_date) 
        values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?) ');

        $create_user->bindValue(1, $lastname, PDO::PARAM_STR);
        $create_user->bindValue(2, $firstname, PDO::PARAM_STR);
        $create_user->bindValue(3, $adresse, PDO::PARAM_STR);
        $create_user->bindValue(4, $postalcode, PDO::PARAM_STR);
        $create_user->bindValue(5, $city, PDO::PARAM_STR);
        $create_user->bindValue(6, $country, PDO::PARAM_STR);
        $create_user->bindValue(7, $email, PDO::PARAM_STR);
        $create_user->bindValue(8, $phone, PDO::PARAM_STR);
        $create_user->bindValue(9, hash('sha256', $password), PDO::PARAM_STR);
        $create_user->bindValue(10, $reg_date, PDO::PARAM_STR);
        $create_user->execute();   

        return $create_user;
    } 

    /*
     * List all customers.
     */
    public function get_all_customer(){
        $get_all_customer = $this->database->prepare('SELECT * FROM customer');

        $get_all_customer->execute();

        $object = $get_all_customer->fetchAll(PDO::FETCH_OBJ);
        $get_all_customer->closeCursor();

        return $object;
    } 

    /*
     * Delete an user for given id.
     */
    public function delete_user($id){
        $delete_user = $this->database->prepare('DELETE FROM customer WHERE idCustomer = ?');
        $delete_user->bindValue(1, $id, PDO::PARAM_INT);
        $delete_user->execute();
        return $delete_user;
    }

}
?>