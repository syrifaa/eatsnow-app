-- Create the Restaurant table
CREATE TABLE restaurant (
    resto_id INT AUTO_INCREMENT PRIMARY KEY,
    resto_name VARCHAR(255) NOT NULL,
    resto_desc TEXT,
    address VARCHAR(255) NOT NULL,
    rating FLOAT NOT NULL DEFAULT 0,
    img_path VARCHAR(255),
    vid_path VARCHAR(255),
    category ENUM('Indonesian', 'Western', 'Italian', 'Chinese', 'Japanese', 'Korean', 'Thai', 'Indian', 'Other')
);

-- Create the Food table
CREATE TABLE food (
    food_id INT AUTO_INCREMENT PRIMARY KEY,
    food_name VARCHAR(255) NOT NULL,
    food_desc TEXT,
    price INT NOT NULL,
    img_path VARCHAR(255),
    resto_id INT,
    FOREIGN KEY (resto_id) REFERENCES restaurant (resto_id)
);

-- Create the Schedule table
CREATE TABLE schedule (
    resto_id INT,
    `day` ENUM('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'),
    open_time TIME,
    close_time TIME,
    FOREIGN KEY (resto_id) REFERENCES restaurant (resto_id)
);

-- Create the User table
CREATE TABLE user (
    email VARCHAR(255) PRIMARY KEY,
    user_name VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    isAdmin BOOLEAN DEFAULT 0
);

-- Insert sample data to the Restaurant table
INSERT INTO restaurant (resto_name, resto_desc, address, rating, img_path, vid_path, category) VALUES 
    ('Ahoe', 'jadi ini konsepnya open kitchen gt yhh, pertama kali yg dicobain potongan bebeknya,,, 
    pas masuk mulut reflek ngomong ANJIR MAKANAN SURGA 😫😫😫 nasi hainannya ENAK BGT super wangi dari pas nunggu makanannya SUMPAH WANGI BGT jadi bikin makin laper, 
    kuahnya juga enak gurih ga hambar, es tehnya seger bgt terus ga terlalu manis, omuricenya porsi nya mayan banyaaaak, di atas nya ada telor yg agak setengah mateng wicis 
    kesukaan ak hehe…. bebek nya juga enak dhhhh bingung diapain tp dapet nya yg ada yg banyak tulang nya hiks kureng sedekah kh tp ga semua sieh ((dr kita bertiga)), kwotienya 
    mayan kecil tp sebanding sm harganya yg AFFORDABLE BGT 10k doang??? enak bgt lg mau nangis sumpah', 
    'Jalan Raya, Cileunyi Wetan, Cileunyi, Bandung Regency, West Java 40622', 
    4.5, NULL, NULL, 'Korean');
    
INSERT INTO restaurant (resto_name, resto_desc, address, rating, img_path, vid_path, category) VALUES 
    ('KFC', 'kentaki fraid ciken', 'Jl. Jatos', 4, NULL, NULL, 'Western');
    
INSERT INTO restaurant (resto_name, resto_desc, address, rating, img_path, vid_path, category) VALUES 
    ('McDonalds', 'mcd', 'Jl. Jatos', 4.2, NULL, NULL, 'Western');
    
INSERT INTO restaurant (resto_name, resto_desc, address, rating, img_path, vid_path, category) VALUES 
    ('Burger King', 'burger king', 'Jl. Jatos', 3.9, NULL, NULL, 'Western');
    
INSERT INTO restaurant (resto_name, resto_desc, address, rating, img_path, vid_path, category) VALUES 
    ('Bakmi GM', 'bakmi gm', 'Jl. Jatos', 4.1, NULL, NULL, 'Western');
    
INSERT INTO restaurant (resto_name, resto_desc, address, rating, img_path, vid_path, category) VALUES 
    ('Bakmi Jawa', 'bakmi jawa', 'Jl. Jatos', 4.4, NULL, NULL, 'Indonesian');
    
INSERT INTO restaurant (resto_name, resto_desc, address, rating, img_path, vid_path, category) VALUES 
    ('Soto Nayla', 'sarapan soto terbaik', 'Jl. lemao', 4.7, NULL, NULL, 'Indonesian');
    
INSERT INTO restaurant (resto_name, resto_desc, address, rating, img_path, vid_path, category) VALUES 
    ('Hipotesa 2', 'tempat paling enak buat diem', 'belakang bekspes', 4.5, NULL, NULL, 'Indonesian');

-- Insert sample data to the Schedule table
INSERT INTO schedule VALUES (1, 'Monday', '08:00:00', '22:00:00');
INSERT INTO schedule VALUES (1, 'Tuesday', '08:00:00', '22:00:00');
INSERT INTO schedule VALUES (1, 'Wednesday', '08:00:00', '22:00:00');
INSERT INTO schedule VALUES (1, 'Thursday', '08:00:00', '22:00:00');
INSERT INTO schedule VALUES (1, 'Friday', '08:00:00', '22:00:00');
INSERT INTO schedule VALUES (1, 'Saturday', '08:00:00', '22:00:00');
INSERT INTO schedule VALUES (1, 'Sunday', '08:00:00', '22:00:00');

INSERT INTO schedule VALUES (2, 'Monday', '09:00:00', '19:00:00');
INSERT INTO schedule VALUES (2, 'Tuesday', '10:00:00', '20:00:00');
INSERT INTO schedule VALUES (2, 'Wednesday', '09:00:00', '19:00:00');
INSERT INTO schedule VALUES (2, 'Thursday', '11:00:00', '18:00:00');
INSERT INTO schedule VALUES (2, 'Friday', '08:00:00', '12:00:00');
    