<?php

class ArtistDTO extends DTO implements IObjectDTO
{
    /**
     * @param Artist $object The artist to add to the database
     * @throws ArtistAlreadyInBaseException
     */
    public function add($object) : void
    {
        $fields = [
            "ID_ARTIST", "ARTIST_LAST_NAME", "ARTIST_FIRST_NAME", "STAGE_NAME", "BIOGRAPHY"
        ];
        $values = [
            $object->getIdArtist(),
            $object->getLastName(),
            $object->getFirstName(),
            $object->getStageName(),
            $object->getBiography()
        ];

        try {
            $this->insertQuery("artist", $fields, $values);
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                throw new ArtistAlreadyInBaseException($e->getMessage());
            }
        }
    }


    /**
     * @param Artist $object The artist to update in the database
     * @return void
     */
    function update($object): void
    {
        $fields = [
            "ARTIST_LAST_NAME", "ARTIST_FIRST_NAME", "ARTIST_STAGE_NAME", "BIOGRAPHY"
        ];
        $values = [
            $object->getLastName(),
            $object->getFirstName(),
            $object->getStageName(),
            $object->getBiography()
        ];

        $this->updateQuery("artist", $fields, $values, "ID_ARTIST", $object->getIdArtist());
    }

    /**
     * @param Artist $object The artist to delete from the database
     * @return void
     */
    function delete($object): void
    {
        $this->deleteQuery("artist", "ID_ARTIST", $object->getIdArtist());
    }
}