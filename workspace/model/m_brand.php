<?php

/* 
 * Author Kristen VIGUIER
 * Copyright 2017 Kristen VIGUIER.
 */
class m_brand {
    private $database;
    
    public function __construct($database) {
        $this->$database = $database;
    }
    
    /*
     * Get all the brand.
     */
    public function get_brands() {
        $get_brands = $this->database->prepare('SELECT * FROM brand');

        $get_brands->execute();

        $object = $get_brands->fetchAll(PDO::FETCH_OBJ);
        $get_brands->closeCursor();

        return $object;
    }

    /*
     * Get an brand by its id.
     */
    public function get_brand($idBrand){
        $get_brand = $this->database->prepare('SELECT * FROM brand WHERE idBrand = ?');

        $get_brand->bindValue(1, $idBrand, PDO::PARAM_INT);
        $get_brand->execute();

        $retour = $get_brand->fetch(PDO::FETCH_OBJ);
        $get_brand->closeCursor();

        return $retour;
    }
    
    /*
     * Update a brand.
     */
    public function update_brand($idBrand, $brand_name, $reg_date){
        $update_brand = $this->database->prepare('UPDATE brand SET brand_name = ?, reg_date = ? WHERE idBrand = ?');

        $update_brand->bindValue(1, $brand_name, PDO::PARAM_STR);
        $update_brand->bindValue(2, $reg_date, PDO::PARAM_STR);
        $update_brand->bindValue(3, $idBrand, PDO::PARAM_INT);

        // Return wheter true of false.
        return $update_brand->execute();
    } 

    /*
     * Delete a brand by its ID.
     */
    public function delete_brand($idBrand){
        $delete_brand = $this->database->prepare('DELETE FROM brand WHERE idBrand = ?');
        $delete_brand->bindValue(1, $idBrand, PDO::PARAM_INT);
        return $delete_brand->execute();
    }

    /*
     * Add a brand type with given param.
     */
    public function add_brand($brand_name, $reg_date){
        $add_brand = $this->database->prepare('INSERT INTO brand (brand_name, reg_date) 
        values (?, ?) ');

        $add_brand->bindValue(1, $brand_name, PDO::PARAM_STR);
        $add_brand->bindValue(2, $reg_date, PDO::PARAM_STR);

        return $add_brand->execute();
    }
}
?>