/*
    Test data (type of admin user is intended to store data for schools, educations and subjects)
*/
INSERT INTO schools (school, created_at, updated_at)
VALUES 
('windesheim', '2023-10-28', '2023-10-28'),
('ROC', '2023-10-28', '2023-10-28'),
('VU', '2023-10-28', '2023-10-28'),
('hva', '2023-10-28', '2023-10-28');

INSERT INTO educations (education_name, created_at, updated_at)
VALUES 
('ADSD', '2023-10-28', '2023-10-28'),
('HBO ICT', '2023-10-28', '2023-10-28'),
('RECHTEN', '2023-10-28', '2023-10-28'),
('APPlicatie en media ontwikkeling', '2023-10-28', '2023-10-28');

INSERT INTO subjects (subject_name, created_at, updated_at)
VALUES 
('SL01', '2023-10-28', '2023-10-28'),
('frontend development', '2023-10-28', '2023-10-28'),
('proffessionele vaardigheden', '2023-10-28', '2023-10-28'),
('applicatie ontwikkeling', '2023-10-28', '2023-10-28');