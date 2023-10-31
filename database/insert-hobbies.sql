/*
    Test data hobbies and hobby_description
*/

INSERT INTO hobbies (hobby, file_extension, user_id)
VALUES 
('skateboarden','.jpg', '9'),
('programmeren', '.jpg', '9');

INSERT INTO hobby_description (user_id, hobbys_description)
VALUES
('9', 'Skateboarden en programmeren zijn top hobbys');