-- Password is : test
INSERT INTO user(id_user, id_payment_method, id_role_type,
                 user_last_name, user_first_name, date_of_birth,
                 user_address, email, hashed_password)
    VALUE (0, 1, 1, 'Mn', 'Jonathan', '2003-07-05', '3 rue de la paix', 'jmn@omg.com',
           '$2y$10$bFajhuKOnKBPMjiPZlNcB.NYmyqzAKGiExSVySMHxB3lLuoAehmai');

-- Password is : test
INSERT INTO user(id_user, id_payment_method, id_role_type,
                 user_last_name, user_first_name, date_of_birth,
                 user_address, email, hashed_password)
    VALUE (1, 2, 1, 'LUCAS', 'Liam', '2003-03-25', 'Rue de la rue la vraie', 'cc@liam.org',
           '$2y$10$bFajhuKOnKBPMjiPZlNcB.NYmyqzAKGiExSVySMHxB3lLuoAehmai');



