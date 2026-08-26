-- NCC Registration Database

CREATE DATABASE IF NOT EXISTS ncc_registration;
USE ncc_registration;

-- Users Table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    mobile_number VARCHAR(15) NOT NULL,
    email_id VARCHAR(100) NOT NULL UNIQUE,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
select * from  users



-- Registration Table (NCC Form Details)
CREATE TABLE IF NOT EXISTS registration (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    date_of_birth DATE NOT NULL,
    nationality VARCHAR(50) NOT NULL,
    father_guardian_name VARCHAR(100) NOT NULL,
    mother_name VARCHAR(100) NOT NULL,
    full_address TEXT NOT NULL,
    mobile_number VARCHAR(15) NOT NULL,
    email_id VARCHAR(100) NOT NULL,
    gender ENUM('Male', 'Female', 'Other') NOT NULL,
    educational_qualification VARCHAR(100) NOT NULL,
    marks VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

select * from registration