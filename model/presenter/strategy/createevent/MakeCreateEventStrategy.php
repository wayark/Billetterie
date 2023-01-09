<?php

class MakeCreateEventStrategy implements CreateEventStrategy
{   
    private array $resultDisplay = array();

    public function handle(array $post): array
    {   
        echo'uwu'
        $eventName = htmlspecialchars($post['eventName']);
        $description = htmlspecialchars($post['description']);
        $country = htmlspecialchars($post['country']);
        $city = htmlspecialchars($post['city']);
        $Hall = htmlspecialchars($post['Hall']);
        $street = htmlspecialchars($post['street']);
        $Date = htmlspecialchars($post['Date']);
        $Artist = htmlspecialchars($post['Artist']);
        $NbPlacesPit = htmlspecialchars($post['NbPlacesPit']);
        $NbSeatsStaircase = htmlspecialchars($post['NbSeatsStaircase']);
        if (!empty($eventName) && !empty($description) && !empty($country) && !empty($city) && !empty($Hall)&& !empty($street)&& !empty($Date)&& !empty($Artist)) {
            $this->createEvent($eventName, $description, $country, $city, $Hall, $street, $Date, $Artist);
        } else {
            $this->set_error("empty");
        }

        print_r($this->resultDisplay);

        return array('resultDisplayCreateevent' => $this->resultDisplay, 'type' => $this->resultDisplay['type']);
    }

    private function createEvent(string $eventname, string $description, string $country, string $city, string $Hall, string $street, string $Date,Artist $artist): void
    {   
        try {
            $eventDAO = new EventDAO();
            $eventDTO = new EventDTO();
            $ArtistDAO = new ArtistDAO();
            $event = new Event($eventDAO->getLastId()+1,new EventInfo($eventname,$Date,null,null,$description), new EventPlace($eventDAO->getLastId()+1,$country,$city,$Hall,$street),$_SESSION['user'],$artist);

            $this->resultDisplay['message'] = "L'évènement a bien été créé";
            $this->resultDisplay['type'] = "success";
        } catch (UserAlreadyInBaseException $e) {
            $this->set_error("alreadyInBase");
        } catch (NoDatabaseException $e) {
            $this->set_error("noDatabase");
        } catch (Exception $e) {
            $this->set_error("unknown");
        }
        $eventDTO->add($event);
        print_r($_SESSION);
    }

    private function set_error(string $type)
    {
        $messages = [
            "empty" => "Tous les champs doivent être complétés",
            "alreadyInBase" => "L'adresse email est déjà utilisée",
            "noDatabase" => "La base de données n'est pas disponible",
            "unknown" => "Une erreur est survenue"
        ];

        $this->resultDisplay['message'] = $messages[$type];
        $this->resultDisplay['type'] = "error";
    }
}

 require_once(PATH_VIEWS . 'createevent.php');
