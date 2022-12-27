<?php

require_once './model/database/DAO.php';
require_once './model/Artist.php';
class ArtistDAO extends DAO
{
    /**
     * Get the artist with the given id
     * @param int $idArtist The id of the artist
     * @return Artist|null The artist or null if not found
     */
    public function getArtistById(int $idArtist): ?Artist
    {
        $sql = "SELECT * FROM Artist WHERE ID_ARTIST = ?";
        $result = $this->queryRow($sql, [$idArtist]);
        return $this->processResult($result);
    }

    /**
     * Get the artist with the given stage name
     * @param string $stageName The stage name of the artist
     * @return Artist|null The artist or null if not found
     */
    public function getArtistByStageName(string $stageName): ?Artist
    {
        $sql = "SELECT * FROM Artist WHERE STAGE_NAME = ?";
        $result = $this->queryRow($sql, [$stageName]);
        return $this->processResult($result);
    }

    /**
     * Get all the artists
     * @return array The artists
     */
    public function getAllArtists(): array {
        $sql = "SELECT * FROM Artist";
        $results = $this->queryAll($sql);
        $artists = array();

        foreach ($results as $result) {
            $artists[] = $this->processResult($result);
        }

        return $artists;
    }

    /**
     * Process the result of a query with a single artist
     * @param mixed $result The result of the query
     * @return Artist|null The artist or null if not found
     */
    private function processResult($result) : ?Artist
    {
        if ($result) {
            return new Artist($result['ID_ARTIST'], $result['ARTIST_FIRST_NAME'], $result['ARTIST_LAST_NAME'],
                $result['STAGE_NAME'], $result['BIOGRAPHY']);
        } else {
            return null;
        }
    }

}