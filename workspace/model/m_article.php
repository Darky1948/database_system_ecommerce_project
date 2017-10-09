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
        public function get_three_last_article() {
            $get_three_last_article = $this->database->prepare('SELECT * FROM article ORDER BY reg_date DESC LIMIT 3');
            $get_three_last_article->execute();

            $object = $get_three_last_article->fetchAll(PDO::FETCH_OBJ);
            $get_three_last_article->closeCursor();

            return $object;
        }
        
        /*
         * Update an article.
         */
        public function update_article($idArticle, $libelle, $price, $quantity, $article_size, $color, $reg_date, $idType, $idBrand, $idMedia){
            $update_article = $this->database->prepare('UPDATE article SET $libelle = ?, $price = ?, $quantity = ?, $article_size = ?, $color = ?, $reg_date = ?, $idType = ?, $idBrand = ?, $idMedia = ? WHERE idArticle = ?');
            
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

    }
?>