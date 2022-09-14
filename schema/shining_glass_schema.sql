/*
For database: shining_glass
Follows cakephp conventions
*/

DROP TABLE IF EXISTS collections_items;
DROP TABLE IF EXISTS images_items;
DROP TABLE IF EXISTS transactions;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS collections;
DROP TABLE IF EXISTS images;
DROP TABLE IF EXISTS items;
DROP TABLE IF EXISTS inquiries;


CREATE TABLE items (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(50) NOT NULL,
	description VARCHAR(250) NOT NULL,
	date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	date_of_creation DATETIME,
	size_in_cm_squared INT(10),
	for_sale TINYINT(1) NOT NULL DEFAULT 0,
	price DECIMAL(8,2),
	collection VARCHAR(50) NOT NULL
	);

CREATE TABLE inquiries (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    phone_number VARCHAR(15),
    full_name VARCHAR(50) NOT NULL,
    date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    message VARCHAR (900) NOT NULL,
    reply_sent TINYINT(1) DEFAULT 0
    );

CREATE TABLE images (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(50) NOT NULL,
    file_path VARCHAR(255),
	thumbnail_file_path VARCHAR(255)
	);

CREATE TABLE collections (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(50) NOT NULL,
	description VARCHAR(250) NOT NULL
	);

CREATE TABLE users (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	is_admin TINYINT(1) DEFAULT 0 NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
	first_name VARCHAR(50) NOT NULL,
	last_name VARCHAR(50) NOT NULL,
	shipping_address VARCHAR(255),
	phone_number VARCHAR(15),
	notes VARCHAR(255)
	);

CREATE TABLE transactions (
	id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	user_id INT UNSIGNED NOT NULL,
	item_id INT UNSIGNED NOT NULL,
	paid_amount DECIMAL(8,2) NOT NULL,
	status VARCHAR(20) NOT NULL DEFAULT 'Pending',
	date_created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	notes VARCHAR(255),
	CONSTRAINT transaction_user FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
	CONSTRAINT transaction_item FOREIGN KEY (item_id) REFERENCES items(id) ON DELETE CASCADE
	);

CREATE TABLE images_items (
	image_id INT UNSIGNED NOT NULL,
	item_id INT UNSIGNED NOT NULL,
	CONSTRAINT i_i_items_fk FOREIGN KEY (item_id) REFERENCES items(id) ON DELETE CASCADE,
	CONSTRAINT i_i_images_fk FOREIGN KEY (image_id) REFERENCES images(id) ON DELETE CASCADE
	);

CREATE TABLE collections_items (
	collection_id INT UNSIGNED NOT NULL,
	item_id INT UNSIGNED NOT NULL,
	CONSTRAINT c_i_items_fk FOREIGN KEY (item_id) REFERENCES items(id) ON DELETE CASCADE,
	CONSTRAINT c_i_collections_fk FOREIGN KEY (collection_id) REFERENCES collections(id) ON DELETE CASCADE
	);

INSERT INTO items (id, name, description, date_added,
                   date_of_creation, size_in_cm_squared, for_sale, price, collection) VALUES
    (1, 'The Twist', 'A beautiful and bespoke twist on a classic formula. The Twist defies all expectations.', '2022-03-24 12:00:00',
       '2020-03-14 11:00:00', 250, 1, 249.99, '2020 Masterworks'),
    (2, 'Sparkles', 'The appearance of this piece will dazzle even the most critical eye.', '2022-05-21 12:03:00',
       '2020-05-08 12:00:00', 200, 0, 129.99, '2020 Masterworks'),
    (3, 'Lovely Red', 'Lovely Red captures the feeling of warmth, in the form of a glass artwork.', '2022-02-24 17:00:10',
        '2020-03-24 12:10:00', 150, 1, 89999.99, '2020 Masterworks'),
    (4, 'Tempered', 'A stern and noble piece of artwork, reflecting at once fragility and strength.', '2022-03-24 12:00:00',
    '2004-03-24 12:00:00', 260, 1, 2249.99, 'The Orb Collection'),
    (5, 'Christmas', 'This hand-crafted bauble is a true Christmas delight.', '2022-05-21 12:03:00',
       '2004-03-24 12:00:00', 100, 0, 549.99, 'The Orb Collection'),
    (6, 'Natural Wonder', 'A subtle piece, reflecting the elegance and simplicity of nature.', '2022-02-24 17:00:10',
        '2006-03-24 12:10:00', 150, 1, 19999.99, 'The Orb Collection');

INSERT INTO images (id, name, file_path, thumbnail_file_path) VALUES
    (1, 'The Twist', 'productimages/GlassArt1.jpg', 'productimages/thumbnails/GlassArt1.jpg'),
    (2, 'Sparkles', 'productimages/GlassArt2.jpg', 'productimages/thumbnails/GlassArt2.jpg'),
    (3, 'Lovely Red' , 'productimages/GlassArt3.jpg', 'productimages/thumbnails/GlassArt3.jpg'),
    (4, 'Tempered', 'productimages/GlassArt4.jpg', 'productimages/thumbnails/GlassArt4.jpg'),
    (5, 'Christmas', 'productimages/GlassArt5.jpg', 'productimages/thumbnails/GlassArt5.jpg'),
    (6, 'Natural Wonder' , 'productimages/GlassArt6.jpg', 'productimages/thumbnails/GlassArt6.jpg');

INSERT INTO images_items (item_id, image_id) VALUES
    (1, 1),
    (2, 2),
    (3, 3),
    (4, 4),
    (5, 5),
    (6, 6);

INSERT INTO collections (id, name, description) VALUES
    (1, '2020 Masterworks', 'Sam worked throughout 2020 to bring this collection to fruition.'),
    (2, 'The Orb Collection', 'A collection of orb-shaped glass artworks, round and profound.');

INSERT INTO collections_items (item_id, collection_id) VALUES
    (1, 1),
    (2, 1),
    (3, 1),
    (4, 2),
    (5, 2),
    (6, 2);

INSERT INTO users (is_admin, email, password, first_name, last_name,
shipping_address, phone_number, notes) VALUES
(1, 'shining_glass@u22s1010.monash-ie.me', '$2a$10$EMSKWBKzY8FPT2gxccdW2O1JkXLtYtxr3AJIPPj7EUhDNjwPfC8ne', 'Administrator', 'Account',
 'Level 16, 201 Elizabeth Street, Melbourne, Victoria 3001', '0411111111', ''),
(0, 'john@u22s1010.monash-ie.me', '$2a$10$EMSKWBKzY8FPT2gxccdW2O1JkXLtYtxr3AJIPPj7EUhDNjwPfC8ne', 'John', 'Jones',
 '123 Elizabeth Street, Melbourne, Victoria 3001', '0411111112', 'John is a loyal customer');
