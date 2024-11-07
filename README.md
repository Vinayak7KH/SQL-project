1. Setting Up the Database In phpMyAdmin, create a database (e.g., lms_db) with tables 

like users, courses, and enrollments. SQL Code to Create Tables: sql Copy code 

DATABASE lms_db; USE 

lms_db;
CREATE TABLE users (

id INT AUTO_INCREMENT PRIMARY KEY,

username VARCHAR(50) NOT NULL UNIQUE,

password VARCHAR(255) NOT NULL,

role ENUM('student', 'teacher', 'admin') DEFAULT 'student'

);

CREATE TABLE courses (

id INT AUTO_INCREMENT PRIMARY KEY,

title VARCHAR(100) NOT NULL,

description TEXT,

created_by INT,

FOREIGN KEY (created_by) REFERENCES users(id)

);

CREATE TABLE enrollments (

id INT AUTO_INCREMENT PRIMARY KEY,

user_id INT,

course_id INT,

FOREIGN KEY (user_id) REFERENCES users(id),

FOREIGN KEY (course_id) REFERENCES courses(id)

);
