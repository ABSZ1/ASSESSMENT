-- create and select the database
DROP DATABASE IF EXISTS Shopping_Database;
CREATE DATABASE Shopping_Database;
USE Shopping_Database;  -- MySQL command

-- create the tables
CREATE TABLE categories (
  categoryID       INT(11)        NOT NULL   AUTO_INCREMENT,
  categoryName     VARCHAR(255)   NOT NULL,
  PRIMARY KEY (categoryID)
);

CREATE TABLE products (
  productID        INT(11)        NOT NULL   AUTO_INCREMENT,
  categoryID       INT(11)        NOT NULL,
  productCode      VARCHAR(10)    NOT NULL   UNIQUE,
  productName      VARCHAR(255)   NOT NULL,
  listPrice        DECIMAL(10,2)  NOT NULL,
  PRIMARY KEY (productID)
);

CREATE TABLE orders (
  orderID        INT(11)        NOT NULL   AUTO_INCREMENT,
  customerID     INT            NOT NULL,
  orderDate      DATETIME       NOT NULL,
  PRIMARY KEY (orderID)
);

-- insert data into the database
INSERT INTO categories VALUES
(1, 'Ambient'),
(2, 'Frozen'),
(3, 'Chilled');

INSERT INTO products VALUES
(1, 1, 'Brd', 'Bread', '6.50'),
(2, 1, 'te', 'Tea', '9.75'),
(3, 1, 'Man', 'Mango', '9.75'),
(4, 2, 'Ff', 'Frozen Fruit', '6.59'),
(5, 2, 'IC', 'Ice Cream', '8.99'),
(6, 3, 'Crd', 'Custard', '9.99'),
(7, 3, 'Mlk', 'Milk', '3.49');

-- create the users and grant priveleges to those users
GRANT SELECT, INSERT, DELETE, UPDATE
ON Shopping_Database.*
TO mgs_user@localhost
IDENTIFIED BY 'pa55word';

GRANT SELECT
ON products
TO mgs_tester@localhost
IDENTIFIED BY 'pa55word';
