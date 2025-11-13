-- Create database
CREATE DATABASE IF NOT EXISTS admin_dashboard;

-- Use database
USE admin_dashboard;

-- Create admins table
CREATE TABLE IF NOT EXISTS admins (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Create events table
CREATE TABLE IF NOT EXISTS events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    date DATE NOT NULL
);

-- Insert sample admin
INSERT INTO admins (username, password) VALUES ('admin', MD5('password'));

-- Insert sample events
INSERT INTO events (name, date) VALUES
('Event 1', '2023-10-01'),
('Event 2', '2023-10-02'),
('Event 3', '2023-10-03');
