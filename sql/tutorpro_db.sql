-- Create database
CREATE DATABASE IF NOT EXISTS tutorpro_db;
USE tutorpro_db;

-- Users Table
CREATE TABLE users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  role_id INT NOT NULL DEFAULT 1 -- 1 = Student, 2 = Admin
);

-- Sample Users
INSERT INTO users (name, email, password, role_id) VALUES
('Admin', 'admin@tutorpro.com', MD5('admin'), 2),
('Student', 'student@tutorpro.com', MD5('student@123'), 1);

-- Courses Table
CREATE TABLE courses (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  image_path VARCHAR(255),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Sample Courses
INSERT INTO courses (title, description, image_path) VALUES
('Intro to AI', 'Beginner-friendly course on artificial intelligence.', '../assets/images/ai.jpg'),
('Data Structures', 'Learn about arrays, stacks, queues, and trees.', '../assets/images/dsa.jpg'),
('English Basics', 'Improve your English communication skills.', '../assets/images/english.jpg'),
('Math 101', 'Foundational mathematics and algebra.', '../assets/images/math.jpg');

-- Enrollments Table
CREATE TABLE enrollments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  course_id INT NOT NULL,
  enrolled_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  UNIQUE KEY unique_enrollment (user_id, course_id),
  FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
  FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
);

-- Sample Enrollment
INSERT INTO enrollments (user_id, course_id) VALUES
(2, 1), -- Student One enrolled in Intro to AI
(2, 2); -- Student One enrolled in Data Structures

-- Contact Messages Table
CREATE TABLE contact_messages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL,
  subject VARCHAR(255),
  message TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Sample Message
INSERT INTO contact_messages (name, email, subject, message) VALUES
('Student', 'student@tutorpro.com', 'Need help', 'I am unable to see my enrolled courses.');

