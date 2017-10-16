<?php

/* 
 * Author Kristen VIGUIER
 * Copyright 2017 Kristen VIGUIER.
 */

class m_comment {
    
    private $database;

    // Constructor
    public function __construct($database) {
        $this->database = $database;
    }

    /*
     * Get all the comments for an article.
     */
    public function get_comments_by_article($idArticle) {
        $get_comments_by_article = $this->database->prepare('SELECT * FROM comment WHERE idArticle = ? ORDER BY reg_date DESC');
        $get_comments_by_article->bindValue(1, $idArticle, PDO::PARAM_INT);
        $get_comments_by_article->execute();

        $object = $get_comments_by_article->fetchAll(PDO::FETCH_OBJ);
        $get_comments_by_article->closeCursor();

        return $object;
    }
    
    /*
     * add a comment with the given params.
     */    
    public function add_comment($text, $idArticle, $idCustomer){
        $add_comment = $this->database->prepare('INSERT INTO comment (text, reg_date, idArticle, idCustomer) 
        values (?, CURRENT_TIMESTAMP, ?, ?) ');
        $add_comment->bindValue(1, $text, PDO::PARAM_STR);
        $add_comment->bindValue(2, $idArticle, PDO::PARAM_INT);
        $add_comment->bindValue(3, $idCustomer, PDO::PARAM_INT);
        return $add_comment->execute();
    }
    
}
?>