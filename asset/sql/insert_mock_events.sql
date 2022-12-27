INSERT INTO event(ID_EVENT, ID_LOCATION, ID_EVENT_TYPE, ID_ORGANIZER,
                  ID_ARTIST, EVENT_NAME, EVENT_DATE, EVENT_DESCRIPTION,
                  PICTURE_PATH, PICTURE_DESCRIPTION)
VALUE (0, 3, 0, 1, 2, 'Le grand retour de Wayark', '2023-01-20 18:00:00', 'Wayark est de retour pour un concert exceptionnel !', 'events/wayark.jpg', 'Wayark en concert');

INSERT INTO event(ID_EVENT, ID_LOCATION, ID_EVENT_TYPE, ID_ORGANIZER,
                  ID_ARTIST, EVENT_NAME, EVENT_DATE, EVENT_DESCRIPTION,
                  PICTURE_PATH, PICTURE_DESCRIPTION)
VALUE (1, 1, 1, 0, 0, 'La bête de soirée mousse', '2023-03-17 22:00:00', 'La bête de soirée mousse organisée par DJ Thierry est un événement incontournable pour tous les amateurs de musique électronique. Cette soirée unique en son genre est remplie d''énergie et de surprises, et promet de faire bouger les foules jusqu''au petit matin.

Au programme de la soirée, vous pourrez découvrir les derniers hits de la musique électronique interprétés par DJ Thierry et ses invités de renom. La piste de danse sera animée par un show de lumières et de lasers, et vous pourrez profiter de jets de mousse fraîche pour vous rafraîchir toute la nuit.

En plus de la musique, la soirée mousse de DJ Thierry propose également un large choix de boissons et de snacks pour vous sustenter tout au long de la nuit. Alors n''hésitez pas à vous habiller en blanc et à vous laisser emporter par la magie de la musique et de la fête. La bête de soirée mousse de DJ Thierry vous attend !', 'events/bdsmousse.jpg', 'La bête de soirée mousse !');

INSERT INTO event(ID_EVENT, ID_LOCATION, ID_EVENT_TYPE, ID_ORGANIZER,
                  ID_ARTIST, EVENT_NAME, EVENT_DATE, EVENT_DESCRIPTION,
                  PICTURE_PATH, PICTURE_DESCRIPTION)
VALUE (2, 2, 1, 0, 1, 'Miel-vigne et cie', '2023-04-01 20:00:00', 'Miel-vigne et cie est un événement unique en son genre. Il s''agit d''une soirée de dégustation de vins et de miels, animée par un DJ et des animations. Vous pourrez ainsi découvrir les saveurs de la région et vous laisser emporter par la musique et la fête.', 'events/mielvigne.jpg', 'Miel-vigne et cie');
