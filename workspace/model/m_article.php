<?php

/* 
 * Author Kristen VIGUIER
 * Copyright 2017 Kristen VIGUIER.
 */

class m_article {
    
    private $database;

    // Constructor
    public function __construct($database) {
        $this->database = $database;
    }

    /*
     * Get all the articles.
     */
    public function get_articles() {
        $get_articles = $this->database->prepare('SELECT * FROM article');

        $get_articles->execute();

        $object = $get_articles->fetchAll(PDO::FETCH_OBJ);
        $get_articles->closeCursor();

        return $object;
    }

    /*
     * Get an article by its id.
     */
    public function get_article($idArticle){
        $get_article = $this->database->prepare('SELECT * FROM article WHERE idArticle = ?');

        $get_article->bindValue(1, $idArticle, PDO::PARAM_INT);
        $get_article->execute();

        $retour = $get_article->fetch(PDO::FETCH_OBJ);
        $get_article->closeCursor();

        return $retour;
    }
    
    /*
     * Get an article by its idType.
     */
    public function get_article_by_type($idType){
        $get_article = $this->database->prepare('SELECT * FROM article WHERE idType = ?');

        $get_article->bindValue(1, $idType, PDO::PARAM_INT);
        $get_article->execute();

        $retour = $get_article->fetchAll(PDO::FETCH_OBJ);
        $get_article->closeCursor();

        return $retour;
    }

    /*
     * Return a set article by page.
     */
    public function get_article_by_page($numPage) {
        // Compute num page - 1 * number of elements by page
        $compute = ($numPage - 1) * NB_ELEMENT_PAGE;

        $get_article_by_page = $this->database->prepare('SELECT * FROM article ORDER BY reg_date DESC LIMIT ?, '.NB_ELEMENT_PAGE);
        $get_article_by_page->bindValue(1, $compute, PDO::PARAM_INT);
        $get_article_by_page->execute();

        $retour = $get_article_by_page->fetchAll(PDO::FETCH_OBJ);
        $get_article_by_page->closeCursor();

        return $retour;
    }

    /*
     * Return the three last article.
     */
    public function get_last_articles() {
        $get_three_last_article = $this->database->prepare('SELECT * FROM article ORDER BY reg_date DESC LIMIT 4');
        $get_three_last_article->execute();

        $object = $get_three_last_article->fetchAll(PDO::FETCH_OBJ);
        $get_three_last_article->closeCursor();

        return $object;
    }

    /*
     * Update an article.
     */
    public function update_article($idArticle, $libelle, $price, $quantity, $article_size, $color, $reg_date, $idType, $idBrand, $idMedia){
        $update_article = $this->database->prepare('UPDATE article SET libelle = ?, price = ?, quantity = ?, article_size = ?, color = ?, reg_date = ?, idType = ?, idBrand = ?, idMedia = ? WHERE idArticle = ?');

        $update_article->bindValue(1, $libelle, PDO::PARAM_STR);
        $update_article->bindValue(2, $price, PDO::PARAM_STR);
        $update_article->bindValue(3, $quantity, PDO::PARAM_INT);
        $update_article->bindValue(4, $article_size, PDO::PARAM_STR);
        $update_article->bindValue(5, $color, PDO::PARAM_STR);
        $update_article->bindValue(6, $reg_date, PDO::PARAM_STR);
        $update_article->bindValue(7, $idType, PDO::PARAM_INT);
        $update_article->bindValue(8, $idBrand, PDO::PARAM_INT);
        $update_article->bindValue(9, $idMedia, PDO::PARAM_INT);
        $update_article->bindValue(10, $idArticle, PDO::PARAM_INT);
        // Return wheter true of false.
        return $update_article->execute();
    } 
    
    /*
     * Update an article quantity.
     */
    public function update_article_quantity($idArticle, $quantity){
        $this->database->beginTransaction();
        
        $update_article = $this->database->prepare('UPDATE article SET quantity = ? WHERE idArticle = ?');
        $update_article->bindValue(1, $quantity, PDO::PARAM_INT);
        $update_article->bindValue(2, $idArticle, PDO::PARAM_INT);
                
        $return = $update_article->execute();
        $this->database->commit();
        return $return;
    }

    /*
     * Delete an article by its ID.
     */
    public function delete_article($idArticle){
        $delete_article = $this->database->prepare('DELETE FROM article WHERE idArticle = ?');
        $delete_article->bindValue(1, $idArticle, PDO::PARAM_INT);
        return $delete_article->execute();
    }

    /*
     * Add an article with given param.
     */
    public function add_articles($libelle, $price, $quantity, $article_size, $color, $reg_date, $idType, $idBrand, $idMedia){
        $add_articles = $this->database->prepare('INSERT INTO articles (libelle, price, quantity, article_size, color, reg_date, idType, idBrand, idMedia) 
        values (?, ?, ?, ?, ?, ?, ?, ?, ?) ');

        $add_articles->bindValue(1, $libelle, PDO::PARAM_STR);
        $add_articles->bindValue(2, $price, PDO::PARAM_STR);
        $add_articles->bindValue(3, $quantity, PDO::PARAM_INT);
        $add_articles->bindValue(4, $article_size, PDO::PARAM_STR);
        $add_articles->bindValue(5, $color, PDO::PARAM_STR);
        $add_articles->bindValue(6, $reg_date, PDO::PARAM_STR);
        $add_articles->bindValue(7, $idType, PDO::PARAM_INT);
        $add_articles->bindValue(8, $idBrand, PDO::PARAM_INT);
        $add_articles->bindValue(9, $idMedia, PDO::PARAM_INT);

        return $add_articles->execute();
    }
    
    /*
     * Search article witht the given words
     */
    public function searching_articles($search){
        // Allow to store result inside an array, we delete whitespace
        $s = explode(" ", $search);
        // We store our request inside a var that we can modifiy depending on the results
        $sqlAND = "SELECT * FROM article";
        $sqlOR = "SELECT * FROM article";
        $i=0; // index

        // Browsing the array $s
        foreach($s as $words) {
            //Avoid SQL injections
            $words = addslashes($words); 

            if(strlen($words)>3){ // Stopwords (like you of ...) small words 
                if($i==0){
                    $sqlAND.= " WHERE ";
                    $sqlOR.= " WHERE ";
                }
                else{
                    $sqlAND.= " AND ";
                    $sqlOR.= " OR ";
                }
                // We finally set our sql request
                $sqlAND.="libelle like '%$words%'";
                $sqlOR.="libelle like '%$words%'";
             
                $i++;
            }

            // UNION of both request AND & OR
            $sql = $sqlAND ." UNION ".$sqlOR;

            // Request treatment
            $searching_articles = $this->database->prepare($sql);
            $searching_articles->execute();

            $return = $searching_articles->fetchAll(PDO::FETCH_OBJ);
            $searching_articles->closeCursor();

            return $return;
        }
    }
}
?>