CREATE TABLE library.books (
	id int(10) NOT NULL auto_increment,
	title varchar(300) NOT NULL,
	isbn varchar(45),
	year text(65535),
	cover varchar(200),
	authors varchar(200),
	available int(10) DEFAULT 0 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE library.rentals (
	id int(10) NOT NULL auto_increment,
	user_id int(10) NOT NULL,
	book_id int(10) NOT NULL,
	expiration_date date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
CREATE TABLE library.users (
	id int(10) NOT NULL auto_increment,
	first_name varchar(45) NOT NULL,
	last_name varchar(45) NOT NULL,
	email varchar(45)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO library.books(id, title, isbn, year, cover, authors, available) VALUES (1, 'Middlesex', '0312422156', '2002', '1.jpg', 'Jeffrey Eugenides', 4);
INSERT INTO library.books(id, title, isbn, year, cover, authors, available) VALUES (2, 'Perfume: The Story of a Murderer', '0140120831', '1987', '2.jpg', 'Patrick Suskind', 3);
INSERT INTO library.rentals(id, user_id, book_id, expiration_date) VALUES (1, 1, 1, '2017-12-05');
INSERT INTO library.rentals(id, user_id, book_id, expiration_date) VALUES (4, 2, 1, '2017-12-01');
INSERT INTO library.users(id, first_name, last_name, email) VALUES (1, 'Vasile', 'Pop', 'vasile.pop@gmail.com');
INSERT INTO library.users(id, first_name, last_name, email) VALUES (2, 'Mihaela', 'Zama', 'mishi@gmail.com');
INSERT INTO library.users(id, first_name, last_name, email) VALUES (5, 'John', 'Doe', 'jd@gmail.com');
