<?php

/* 
 * Author Kristen VIGUIER
 * Copyright 2017 Kristen VIGUIER.
 */
class m_media {
    private $database;
    
    public function __construct($database) {
        $this->$database = $database;
    }

    /*
     * Get a media by its id.
     */
    public function get_media($idMedia){
        $get_media = $this->database->prepare('SELECT * FROM media WHERE idMedia = ?');

        $get_media->bindValue(1, $idMedia, PDO::PARAM_INT);
        $get_media->execute();

        $retour = $get_media->fetch(PDO::FETCH_OBJ);
        $get_media->closeCursor();

        return $retour;
    }
    
    /*
     * Update a media.
     */
    public function update_media($idMedia, $file_path, $file_name, $reg_date){
        $update_media = $this->database->prepare('UPDATE media SET file_path = ?, file_name = ?, reg_date = ? WHERE idMedia = ?');

        $update_media->bindValue(1, $file_path, PDO::PARAM_STR);
        $update_media->bindValue(2, $file_name, PDO::PARAM_STR);
        $update_media->bindValue(3, $reg_date, PDO::PARAM_STR);
        $update_media->bindValue(4, $idMedia, PDO::PARAM_INT);

        // Return wheter true of false.
        return $update_media->execute();
    } 

    /*
     * Delete a media by its ID.
     */
    public function delete_Media($idMedia){
        $delete_Media = $this->database->prepare('DELETE FROM media WHERE idMedia = ?');
        $delete_Media->bindValue(1, $idCategory, PDO::PARAM_INT);
        return $delete_Media->execute();
    }

    /*
     * Add a media type with given param.
     */
    public function add_media($file_path, $file_name, $reg_date){
        $add_media = $this->database->prepare('INSERT INTO media (file_path, file_name, reg_date) 
        values (?, ?, ?) ');

        $add_media->bindValue(1, $file_path, PDO::PARAM_STR);
        $add_media->bindValue(2, $file_name, PDO::PARAM_STR);
        $add_media->bindValue(3, $reg_date, PDO::PARAM_STR);

        return $add_media->execute();
    }
}
?>