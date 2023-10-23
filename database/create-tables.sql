CREATE TABLE users (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    firstName VARCHAR(30) NOT NULL,
    lastName VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL,
    role_id INT(11) NOT NULL
);

CREATE TABLE roles (
    id int(11) AUTO_INCREMENT PRIMARY KEY,
    role VARCHAR(30) NOT NULL
);

CREATE TABLE hobbies (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    hobby VARCHAR(255) NOT NULL
);

CREATE TABLE hobby_user (
    hobby_id INT(11) NOT NULL,
    user_id INT(11) NOT NULL
);

CREATE TABLE job_experiences (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    job_id INT(11) NOT NULL,
    user_id INT(11) NOT NULL,
    employer VARCHAR(255) NOT NULL,
    start_date DATETIME NOT NULL,
    end_date DATETIME NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL
);

CREATE TABLE job_titles (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    job_title VARCHAR(255) NOT NULL
);


CREATE TABLE schools (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    school VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL
);

CREATE TABLE educations (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    education_name VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL
);

CREATE TABLE subjects (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    subject_name VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL
);

CREATE TABLE diplomas_achieved (
    school_id INT(11) NOT NULL,
    education_id INT(11) NOT NULL,
    user_id INT(11) NOT NULL,
    created_at DATETIME NOT NULL,
    updated_at DATETIME NOT NULL
);

CREATE TABLE educations_schools_subjects (
    education_id INT(11) NOT NULL,
    school_id INT(11) NOT NULL,
    user_id INT(11) NOT NULL
);

CREATE TABLE marks_subjects_users (
    mark INT(11) NOT NULL,
    subject_id INT(11) NOT NULL,
    user_id INT(11) NOT NULL
);

CREATE TABLE educations_schools_users (
    education_id INT(11) NOT NULL,
    school_id INT(11) NOT NULL,
    user_id INT(11) NOT NULL
);

CREATE TABLE subjects_users (
    subject_id int(11) NOT NULL,
    user_id int(11) NOT NULL,
)