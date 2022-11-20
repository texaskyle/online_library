CREATE TABLE users (
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(256) NOT NULL,
    reg_no VARCHAR(256) NOT NULL,
    email VARCHAR(256) NOT NULL,
    pwd VARCHAR(256) NOT NULL
);

-- table of books
CREATE TABLE books(
    book_id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    b_profile VARCHAR(256),
    b_isbn 	INT(11) NOT NULL,
    b_title VARCHAR(256) NOT NULL,
    b_author VARCHAR(256) NOT NULL,
    b_category VARCHAR(256) NOT NULL,
    b_copies INT(11) NOT NULL,
    b_price INT(11) NOT NULL
    
);