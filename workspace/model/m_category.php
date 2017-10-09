<?php

/* 
 * Author Kristen VIGUIER
 * Copyright 2017 Kristen VIGUIER.
 */
class m_category {
    private $database;
    
    public function __construct($database) {
        $this->$database = $database;
    }
    
    /*
     * Get all the categories.
     */
    public function get_categories() {
        $get_categories = $this->database->prepare('SELECT * FROM category');

        $get_categories->execute();

        $object = $get_categories->fetchAll(PDO::FETCH_OBJ);
        $get_categories->closeCursor();

        return $object;
    }

    /*
     * Get an category by its id.
     */
    public function get_category($idCategory){
        $get_category = $this->database->prepare('SELECT * FROM category WHERE idCategory = ?');

        $get_category->bindValue(1, $idCategory, PDO::PARAM_INT);
        $get_category->execute();

        $retour = $get_category->fetch(PDO::FETCH_OBJ);
        $get_category->closeCursor();

        return $retour;
    }
    
    /*
     * Update a category.
     */
    public function update_category($idCategory, $libelle, $reg_date){
        $update_category = $this->database->prepare('UPDATE category SET libelle = ?, reg_date = ? WHERE idCategory = ?');

        $update_category->bindValue(1, $libelle, PDO::PARAM_STR);
        $update_category->bindValue(2, $reg_date, PDO::PARAM_STR);
        $update_category->bindValue(3, $idCategory, PDO::PARAM_INT);

        // Return wheter true of false.
        return $update_category->execute();
    } 

    /*
     * Delete a category by its ID.
     */
    public function delete_category($idCategory){
        $delete_category = $this->database->prepare('DELETE FROM category WHERE idCategory = ?');
        $delete_category->bindValue(1, $idCategory, PDO::PARAM_INT);
        return $delete_category->execute();
    }

    /*
     * Add a category type with given param.
     */
    public function add_category($libelle, $reg_date){
        $add_category = $this->database->prepare('INSERT INTO category (libelle, reg_date) 
        values (?, ?) ');

        $add_category->bindValue(1, $libelle, PDO::PARAM_STR);
        $add_category->bindValue(2, $reg_date, PDO::PARAM_STR);

        return $add_category->execute();
    }
}
?>