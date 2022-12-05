<?php

class Picture
{
    private int $idPicture;
    private string $picturePath;
    private string $pictureName;
    private string $pictureDescription;

    public function __construct(int $idPicture = -1,
                                string $picturePath = "",
                                string $pictureName = "",
                                string $pictureDescription = "")
    {
        $this->idPicture = $idPicture;
        $this->picturePath = PATH_IMAGES . $picturePath;
        $this->pictureName = $pictureName;
        $this->pictureDescription = $pictureDescription;
    }

    /**
     * @return int
     */
    public function getIdPicture(): int
    {
        return $this->idPicture;
    }

    /**
     * @param int $idPicture
     */
    public function setIdPicture(int $idPicture): void
    {
        $this->idPicture = $idPicture;
    }

    /**
     * @return string
     */
    public function getPicturePath(): string
    {
        return $this->picturePath;
    }

    /**
     * @return string
     */
    public function getPictureName(): string
    {
        return $this->pictureName;
    }

    /**
     * @param string $pictureName
     */
    public function setPictureName(string $pictureName): void
    {
        $this->pictureName = $pictureName;
        $this->picturePath = PATH_IMAGES . $pictureName;
    }

    /**
     * @return string
     */
    public function getPictureDescription(): string
    {
        return $this->pictureDescription;
    }

    /**
     * @param string $pictureDescription
     */
    public function setPictureDescription(string $pictureDescription): void
    {
        $this->pictureDescription = $pictureDescription;
    }

}