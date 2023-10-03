-- Create the Restaurant table
CREATE TABLE Restaurant (
    resto_id INT AUTO_INCREMENT PRIMARY KEY,
    resto_name VARCHAR(255) NOT NULL,
    resto_desc VARCHAR(512),
    address VARCHAR(255) NOT NULL,
    rating FLOAT NOT NULL DEFAULT 0
);

-- Create the Category table
CREATE TABLE Category (
    category_id TINYINT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(16) NOT NULL
);

-- Create the resto_category table for the many-to-many relationship between Restaurant and Category
CREATE TABLE resto_category (
    resto_id INT,
    category_id TINYINT,
    FOREIGN KEY (resto_id) REFERENCES Restaurant (resto_id),
    FOREIGN KEY (category_id) REFERENCES Category (category_id)
);

-- Create the Food table
CREATE TABLE Food (
    food_id INT AUTO_INCREMENT PRIMARY KEY,
    food_name VARCHAR(255) NOT NULL,
    food_desc TEXT,
    price INT NOT NULL,
    img_path VARCHAR(255),
    resto_id INT,
    FOREIGN KEY (resto_id) REFERENCES Restaurant (resto_id)
);

-- Create the Media table
CREATE TABLE Media (
    media_path VARCHAR(255) PRIMARY KEY,
    resto_id INT,
    media_type ENUM('image', 'video'),
    FOREIGN KEY (resto_id) REFERENCES Restaurant (resto_id)
);

-- Create the Schedule table
CREATE TABLE Schedule (
    resto_id INT,
    `day` ENUM('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'),
    open_time TIME,
    close_time TIME,
    FOREIGN KEY (resto_id) REFERENCES Restaurant (resto_id)
);

-- Create the User table
CREATE TABLE User (
    email VARCHAR(255) PRIMARY KEY,
    user_name VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    isAdmin BOOLEAN DEFAULT 0
);