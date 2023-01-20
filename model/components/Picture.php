<?php

class Picture
{
    private string $picturePath;
    private string $pictureDescription;

    public function __construct(string $picturePath = "", string $pictureDescription = "")
    {
        $this->picturePath = PATH_IMAGES . $picturePath;
        $this->pictureDescription = $pictureDescription;
    }

    /**
     * @return string
     */
    public function getPicturePath(): string
    {
        return $this->picturePath;
    }

    /**
     * @param string $picturePath
     */
    public function setPicturePath(string $picturePath): void
    {
        $this->picturePath = PATH_IMAGES . $picturePath;
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