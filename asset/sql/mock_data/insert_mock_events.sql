INSERT INTO event(ID_LOCATION, ID_EVENT_TYPE, ID_ORGANIZER,
                  ID_ARTIST, EVENT_NAME, EVENT_DATE, EVENT_DESCRIPTION,
                  PICTURE_PATH, PICTURE_DESCRIPTION)
VALUE (3, 1, 2, 3, 'Le grand retour de Wayark', '2023-01-20 18:00:00', '"Le grand retour de Wayark" est un événement incontournable pour tous les fans de musique et de guitar hero. Organisé par le célèbre guitariste Liam LUCAS, connu sous le nom de scène "Wayark", cet événement promet d''être une soirée inoubliable pleine de surprises et de talent.<br>

Au programme de la soirée, vous pourrez découvrir les derniers hits de Wayark interprétés par le guitariste lui-même, ainsi que ses invités de renom. La scène sera animée par un show de lumières et de lasers, et vous pourrez profiter de la puissance et de la maîtrise de Wayark à la guitare.<br>

En plus de la musique, "Le grand retour de Wayark" propose également un large choix de boissons et de snacks pour vous sustenter tout au long de la nuit. Alors n''hésitez pas à vous laisser emporter par la magie de la musique et de la fête. "Le grand retour de Wayark" vous attend !', 'events/wayark.jpg', 'Wayark en concert');

INSERT INTO ticket_pricing(ID_EVENT, NAME_TICKET_PRICING, PRICE, MAX_TICKET_NUMBER)
VALUES (1, 'Fosse', 13.43, 50),
       (1, 'Gradin', 20, 30);

INSERT INTO event(ID_LOCATION, ID_EVENT_TYPE, ID_ORGANIZER,
                  ID_ARTIST, EVENT_NAME, EVENT_DATE, EVENT_DESCRIPTION,
                  PICTURE_PATH, PICTURE_DESCRIPTION)
VALUE (1, 2, 1, 1, 'La bête de soirée mousse', '2023-03-17 22:00:00', 'La bête de soirée mousse organisée par DJ Thierry est un événement incontournable pour tous les amateurs de musique électronique. Cette soirée unique en son genre est remplie d''énergie et de surprises, et promet de faire bouger les foules jusqu''au petit matin.<br>

Au programme de la soirée, vous pourrez découvrir les derniers hits de la musique électronique interprétés par DJ Thierry et ses invités de renom. La piste de danse sera animée par un show de lumières et de lasers, et vous pourrez profiter de jets de mousse fraîche pour vous rafraîchir toute la nuit.<br>

En plus de la musique, la soirée mousse de DJ Thierry propose également un large choix de boissons et de snacks pour vous sustenter tout au long de la nuit. Alors n''hésitez pas à vous habiller en blanc et à vous laisser emporter par la magie de la musique et de la fête. La bête de soirée mousse de DJ Thierry vous attend !', 'events/bdsmousse.jpg', 'La bête de soirée mousse !');

INSERT INTO ticket_pricing(ID_EVENT, NAME_TICKET_PRICING, PRICE, MAX_TICKET_NUMBER)
VALUES (2, 'Accès à la piste de danse', 10, 100),
       (2, 'Accès à la piste de danse + jet de mousse', 15, 50);;

INSERT INTO event(ID_LOCATION, ID_EVENT_TYPE, ID_ORGANIZER,
                  ID_ARTIST, EVENT_NAME, EVENT_DATE, EVENT_DESCRIPTION,
                  PICTURE_PATH, PICTURE_DESCRIPTION)
VALUE (2, 4, 1, 2, 'Miel-vigne et cie', '2023-04-01 20:00:00', 'Miel-vigne et cie est un événement unique en son genre. Il s''agit d''une soirée de dégustation de vins et de miels, animée par un DJ et des animations. Vous pourrez ainsi découvrir les saveurs de la région et vous laisser emporter par la musique et la fête.', 'events/mielvigne.jpg', 'Miel-vigne et cie');

INSERT INTO ticket_pricing(ID_EVENT, NAME_TICKET_PRICING, PRICE, MAX_TICKET_NUMBER)
VALUES (3, 'Accès à la soirée', 10, 100),
       (3, 'Accès à la soirée + 1 verre de vin', 15, 50),
       (3, 'Accès à la soirée + 1 verre de vin + 1 pot de miel', 20, 30);