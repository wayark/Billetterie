<?php

require_once './model/database/DAO.php';

class PictureDAO extends DAO
{
    public function getPictureById($idPicture): ?Picture
    {
        $sql = "SELECT * FROM Picture WHERE idPicture = ?";
        $result = $this->queryRow($sql, [$idPicture]);
        if ($result) {
            return new Picture($result['IdPicture'], $result['NamePicture'], $result['descriptionPicture']);
        }
        return null;
    }

    public function getAllPictures(): array
    {
        $sql = "SELECT * FROM Picture";
        $result = $this->queryAll($sql);
        $pictures = array();
        foreach ($result as $row) {
            $pictures[] = new Picture($row['IdPicture'], $row['NamePicture'], $row['descriptionPicture']);
        }
        return $pictures;
    }
}