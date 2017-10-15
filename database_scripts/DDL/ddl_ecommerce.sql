/* 
 * Author Kristen VIGUIER
 * Copyright 2017 Kristen VIGUIER.
 */

CREATE TABLE CUSTOMER (
    idCustomer INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    lastname VARCHAR(30) NOT NULL,
    firstname VARCHAR(30) NOT NULL,
    adresse VARCHAR(30) NOT NULL,
    postalcode VARCHAR(30) NOT NULL,
    city VARCHAR(30) NOT NULL,
    country VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    phone VARCHAR(30) NOT NULL,
    password VARCHAR(50),
    reg_date TIMESTAMP
);

CREATE TABLE ORDERS (
    idOrder INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    quantity INT UNSIGNED,
    Ordering_date TIMESTAMP,
    idCustomer INT UNSIGNED,
    idArticle INT UNSIGNED
);

ALTER TABLE ORDERS 
ADD CONSTRAINT FK_CustomerOrder
FOREIGN KEY (idCustomer) REFERENCES CUSTOMER(idCustomer);

ALTER TABLE ORDERS 
ADD CONSTRAINT FK_ArticleOrder
FOREIGN KEY (idArticle) REFERENCES ARTICLE(idArticle);


CREATE TABLE ADMIN (
    idAdmin INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    account VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    lastname VARCHAR(30),
    firstname VARCHAR(30),
    reg_date TIMESTAMP
);

CREATE TABLE CATEGORY (
    idCategory INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP
);

CREATE TABLE ARTICLETYPE (
    idType INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(30) NOT NULL,
    valid VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP,
    idCategory INT(6) UNSIGNED
);

ALTER TABLE ARTICLETYPE 
ADD CONSTRAINT FK_TypeCatergory
FOREIGN KEY (idCategory) REFERENCES CATEGORY(idCategory);

CREATE TABLE MEDIA (
    idMedia INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_path VARCHAR(30),
    file_name VARCHAR(30),
    reg_date TIMESTAMP
);

CREATE TABLE BRAND (
    idBrand INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    brand_name VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP
);


CREATE TABLE ARTICLE (
    idArticle INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(30) NOT NULL,
    price DECIMAL NOT NULL,
    quantity INT UNSIGNED,
    article_size VARCHAR(30),
    color VARCHAR(30),
    reg_date TIMESTAMP,
    idType INT(6) UNSIGNED,
    idBrand INT(6) UNSIGNED,
    idMedia INT(6) UNSIGNED
);

CREATE TABLE COMMENT (
    idComment INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    text varchar(500),
    reg_date TIMESTAMP,
    idArticle INT(6) UNSIGNED,
    idCustomer INT(6) UNSIGNED
);

ALTER TABLE COMMENT 
ADD CONSTRAINT FK_CustomerComment
FOREIGN KEY (idCustomer) REFERENCES CUSTOMER(idCustomer);

ALTER TABLE COMMENT 
ADD CONSTRAINT FK_ArticleComment
FOREIGN KEY (idArticle) REFERENCES ARTICLE(idArticle);

CREATE TABLE RECOMMANDEDARTICLE (
    idRecommendedArticle INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    idArticle1 INT(6) UNSIGNED NOT NULL,
    idArticle2 INT(6) UNSIGNED NOT NULL,
    percentage DECIMAL,
    reg_date TIMESTAMP
);

ALTER TABLE RECOMMANDEDARTICLE
ADD CONSTRAINT UC_RECOMMANDEDARTICLE 
UNIQUE (idArticle1,idArticle2);

ALTER TABLE RECOMMANDEDARTICLE 
ADD CONSTRAINT FK_Article1RecommendedArticle
FOREIGN KEY (idArticle1) 
REFERENCES ARTICLE(idArticle);

ALTER TABLE RECOMMANDEDARTICLE 
ADD CONSTRAINT FK_Article2RecommendedArticle
FOREIGN KEY (idArticle2) 
REFERENCES ARTICLE(idArticle);

CREATE TABLE CART (
    idCustomer INT(6) UNSIGNED,
    idArticle INT(6) UNSIGNED
);

ALTER TABLE CART
ADD CONSTRAINT PK_Cart PRIMARY KEY (idCustomer, idArticle);

ALTER TABLE CART
ADD CONSTRAINT FK_CartCustomer
FOREIGN KEY (idCustomer) REFERENCES CUSTOMER(idCustomer);

ALTER TABLE CART
ADD CONSTRAINT FK_CartArticle
FOREIGN KEY (idArticle) REFERENCES ARTICLE(idArticle);

