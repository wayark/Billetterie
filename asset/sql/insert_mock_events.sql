DELETE
FROM Picture
WHERE IdPicture <= 0;
DELETE
FROM Artist
WHERE IdArtist < 0;
DELETE
FROM event
where IdEvent < 0;

INSERT INTO Picture(IdPicture, NamePicture, descriptionPicture)
VALUES (0, 'test', 'test');
INSERT INTO User (iduser, userlastname, userfirstname, dateofbirth, favoritepaymentmode, useradress, mail, role,
                  h_password)
VALUES (0, 'Papy', 'Jonathan', '2003-12-12', 'paypal', '2 rue de la paix', 'titi@gmail.com', 1, 'PASS');
INSERT INTO Artist (IdArtist, ArtistFirstName, ArtistLastName, StageName, Biography)
VALUES (0, 'DJ', 'Thierry', 'Titi', 'Titi est un véritable artiste des rues de Zaun. Il a commencé à faire de la musique dans les rues de Zaun, et a rapidement gagné en popularité. Il a commencé à faire des concerts dans les bars de Zaun, et a rapidement gagné en popularité.');

INSERT INTO event(idevent, eventname, country, city, hall, date, idtypeevent, idpicture, organizerid, nbplacespit,
                  nbseatsstaircase, idartist, description)
VALUES (0, 'Soirée mousse', 'France', 'Lyon', 'Le transbordeur', '2021-01-01', 0, 0, 0, 100, 100, 0, 'Enfin, la soirée que l''on attendait tous ! Une soirée mousse, avec des jeux, des surprises, et des animations ! ');
