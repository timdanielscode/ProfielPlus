CREATE TABLE `diplomas_achieved` (
  `school_id` int(11) NOT NULL,
  `education_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
);

CREATE TABLE `educations` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `education_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
);

CREATE TABLE `educations_schools_subjects` (
  `education_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
);

CREATE TABLE `educations_schools_users` (
  `education_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
);

CREATE TABLE `hobbies` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `hobby` varchar(255) NOT NULL
);

CREATE TABLE `hobby_user` (
  `user_id` int(11) NOT NULL,
  `hobby_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL
);

CREATE TABLE `images` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `file_path` varchar(255) NOT NULL
);

CREATE TABLE `job_experiences` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `employer` varchar(255) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `details` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
);

CREATE TABLE `marks_subjects_users` (
  `mark` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
);

CREATE TABLE `roles` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `role` varchar(30) NOT NULL
);

CREATE TABLE `schools` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `school` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
);

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `subject_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
);

CREATE TABLE `users` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `role_id` int(11) NOT NULL,
  `hobby_description` varchar(255) DEFAULT NULL
);