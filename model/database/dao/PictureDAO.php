<?php

require_once './model/database/DAO.php';

class PictureDAO extends DAO
{
    public function getPictureById($idPicture)
    {
        $sql = "SELECT * FROM picture WHERE idPicture = ?";
        $result = $this->queryRow($sql, [$idPicture]);
        if ($result != null) {
            return new Picture($result['idPicture'], $result['NamePicture'], $result['descriptionPicture']);
        }
        return null;
    }

    public function getAllPictures()
    {
        $sql = "SELECT * FROM picture";
        $result = $this->queryAll($sql);
        $pictures = array();
        foreach ($result as $row) {
            $pictures[] = new Picture($row['idPicture'], $row['NamePicture'], $row['descriptionPicture']);
        }
        return $pictures;
    }
}