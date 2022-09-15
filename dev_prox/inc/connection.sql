--

CREATE DATABASE IF NOT EXISTS devpost;
USE devpost;
CREATE TABLE IF NOT EXISTS csv_imports(
	id int NOT null PRIMARY KEY AUTO_INCREMENT,
    name varchar(50) not null,
    surname varchar(50) not null,
    initials char(3) not null,
    age int(2) not null,
    birthdare date not null
);

CREATE TABLE IF NOT EXISTS file_imports( 
    id int not null primary key AUTO_INCREMENT, 
    file text not null, 
    date_inserted TIMESTAMP on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP not null 
);