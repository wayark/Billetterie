<?php
class EventDTO extends DTO implements IObjectDTO
{
    /**
     * @param Event $object The event to add to the database
     * @throws EventAlreadyInBaseException
     */
    function add($object): void
    {
        $fields = [
            "ID_EVENT",
            "ID_LOCATION",
            "ID_EVENT_TYPE",
            "ID_ORGANIZER",
            "ID_ARTIST",
            "EVENT_NAME",
            "EVENT_DATE",
            "EVENT_DESCRIPTION",
            "PICTURE_PATH",
            "PICTURE_DESCRIPTION"
        ];

        echo $object->getEventInfo()->getPicture()->getPicturePath() . '<br>';
        echo substr($object->getEventInfo()->getPicture()->getPicturePath(), strlen(PATH_IMAGES)) . '<br>';

        $values = [
            $object->getIdEvent(),
            $object->getEventPlace()->getIdLocation(),
            $object->getEventInfo()->getEventType()->getId(),
            $object->getOrganizer()->getId(),
            $object->getArtist()->getIdArtist(),
            $object->getEventInfo()->getEventName(),
            $object->getEventInfo()->getEventDate(),
            $object->getEventInfo()->getEventDescription(),
            substr($object->getEventInfo()->getPicture()->getPicturePath(), strlen(PATH_IMAGES)),
            $object->getEventInfo()->getPicture()->getPictureDescription()
        ];

        try {
            $this->insertQuery("event", $fields, $values);
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                throw new EventAlreadyInBaseException($e->getMessage());
            }
        }
    }

    /**
     * @param Event $object The event to update in the database
     * @return void Update the event in the database
     */
    function update($object): void
    {
        $fields = [
            "ID_LOCATION",
            "ID_EVENT_TYPE",
            "ID_ORGANIZER",
            "ID_ARTIST",
            "EVENT_NAME",
            "EVENT_DATE",
            "EVENT_DESCRIPTION",
            "PICTURE_PATH",
            "PICTURE_DESCRIPTION"
        ];

        $values = [
            $object->getEventPlace()->getIdLocation(),
            $object->getEventInfo()->getEventType()->getId(),
            $object->getOrganizer()->getId(),
            $object->getArtist()->getIdArtist(),
            $object->getEventInfo()->getEventName(),
            $object->getEventInfo()->getEventDate(),
            $object->getEventInfo()->getEventDescription(),
            substr($object->getEventInfo()->getPicture()->getPicturePath(), strlen(PATH_IMAGES)),
            $object->getEventInfo()->getPicture()->getPictureDescription()
        ];

        $this->updateQuery("event", $fields, $values, "ID_EVENT", $object->getIdEvent());
    }

    /**
     * @param Event $object The event to delete from the database
     * @return void Delete the event from the database
     */
    function delete($object): void
    {
        $this->deleteQuery("event", "ID_EVENT", $object->getIdEvent());
    }
}
