<?php

/* 
 * Author Kristen VIGUIER
 * Copyright 2017 Kristen VIGUIER.
 */
class m_articleType {
    private $database;
    
    public function __construct($database) {
        $this->$database = $database;
    }
    
    /*
     * Get all the articles type.
     */
    public function get_articles_type() {
        $get_articles_type = $this->database->prepare('SELECT * FROM articleType');

        $get_articles_type->execute();

        $object = $get_articles_type->fetchAll(PDO::FETCH_OBJ);
        $get_articles_type->closeCursor();

        return $object;
    }

    /*
     * Get an article type by its id.
     */
    public function get_article_type($idType){
        $get_article_type = $this->database->prepare('SELECT * FROM articleType WHERE idType = ?');

        $get_article_type->bindValue(1, $idType, PDO::PARAM_INT);
        $get_article_type->execute();

        $retour = $get_article_type->fetch(PDO::FETCH_OBJ);
        $get_article_type->closeCursor();

        return $retour;
    }
    
    /*
     * Update an article type.
     */
    public function update_article_type($idType, $libelle, $valid, $reg_date, $idCategory){
        $update_article_type = $this->database->prepare('UPDATE articleType SET libelle = ?, valid = ?, reg_date = ?, idCategory = ? WHERE idType = ?');

        $update_article_type->bindValue(1, $libelle, PDO::PARAM_STR);
        $update_article_type->bindValue(2, $valid, PDO::PARAM_BOOL);
        $update_article_type->bindValue(3, $reg_date, PDO::PARAM_STR);
        $update_article_type->bindValue(4, $idCategory, PDO::PARAM_INT);
        $update_article_type->bindValue(5, $idType, PDO::PARAM_INT);

        // Return wheter true of false.
        return $update_article_type->execute();
    } 

    /*
     * Delete an article type by its ID.
     */
    public function delete_article_type($idType){
        $delete_article = $this->database->prepare('DELETE FROM articleType WHERE idType = ?');
        $delete_article->bindValue(1, $idType, PDO::PARAM_INT);
        return $delete_article->execute();
    }

    /*
     * Add an article type with given param.
     */
    public function add_articles($libelle, $valid, $reg_date, $idCategory){
        $add_articles = $this->database->prepare('INSERT INTO articles (libelle, valid, reg_date, idCategory) 
        values (?, ?, ?, ?) ');

        $add_articles->bindValue(1, $libelle, PDO::PARAM_STR);
        $add_articles->bindValue(2, $valid, PDO::PARAM_BOOL);
        $add_articles->bindValue(3, $reg_date, PDO::PARAM_STR);
        $add_articles->bindValue(4, $idCategory, PDO::PARAM_INT);

        return $add_articles->execute();
    }
}
?>