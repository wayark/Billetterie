-- Password is : test
INSERT INTO user(ID_FAVORITE_PAYMENT_METHOD, id_role_type,
                 user_last_name, user_first_name, date_of_birth,
                 user_address, email, hashed_password, PICTURE_PATH)
    VALUE (1, 1, 'Mn', 'Jonathan', '2003-07-05', '3 rue de la paix', 'jmn@omg.com',
           '$2y$10$bFajhuKOnKBPMjiPZlNcB.NYmyqzAKGiExSVySMHxB3lLuoAehmai', 'users/unnamed.jpg');

-- Password is : test
INSERT INTO user(ID_FAVORITE_PAYMENT_METHOD, id_role_type,
                 user_last_name, user_first_name, date_of_birth,
                 user_address, email, hashed_password, PICTURE_PATH)
    VALUE (2, 1, 'LUCAS', 'Liam', '2003-03-25', 'Rue de la rue la vraie', 'cc@liam.org',
           '$2y$10$bFajhuKOnKBPMjiPZlNcB.NYmyqzAKGiExSVySMHxB3lLuoAehmai', 'users/unnamed.jpg');



