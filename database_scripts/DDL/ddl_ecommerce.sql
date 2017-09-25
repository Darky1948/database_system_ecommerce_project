/* 
 * The MIT License
 *
 * Copyright 2017 Kristen VIGUIER.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */
/**
 * Author:  Kristen VIGUIER
 * Created: 25 sept. 2017
 */

CREATE TABLE CUSTOMER (
    idCustomer INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    lastname VARCHAR(30) NOT NULL,
    firstname VARCHAR(30) NOT NULL,
    adresse VARCHAR(30) NOT NULL,
    postalcode VARCHAR(30) NOT NULL,
    city VARCHAR(30) NOT NULL,
    country VARCHAR(30) NOT NULL,
    phone VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(50),
    reg_date TIMESTAMP,
)

CREATE TABLE ORDERS (
    idOrder INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    quantity INT UNSIGNED,
    Ordering_date TIMESTAMP,
    idCustomer INT
)

ALTER TABLE ORDERS 
ADD CONSTRAINT FK_CustomerOrder
FOREIGN KEY (idCustomer) REFERENCES CUSTOMER(idCustomer);


CREATE TABLE ADMIN (
    idAdmin INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    account VARCHAR(30) NOT NULL,
    password VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    lastname VARCHAR(30),
    firstname VARCHAR(30),
    reg_date TIMESTAMP
)

CREATE TABLE CATEGORY (
    idCategory INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP
)

CREATE TABLE ARTICLETYPE (
    idType INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    libelle VARCHAR(30) NOT NULL,
    valid VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP,
    idCategory INT(6)
)

ALTER TABLE ARTICLETYPE 
ADD CONSTRAINT FK_TypeCatergory
FOREIGN KEY (idCategory) REFERENCES CATEGORY(idCategory);

CREATE TABLE MEDIA (
    idMedia INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_path VARCHAR(30),
    file_name VARCHAR(,
    reg_date TIMESTAMP
)

CREATE TABLE BRAND (
    idBrand INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    brand_name VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP
)


CREATE TABLE ARTICLE (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
)

CREATE TABLE COMMENT {
    idComment (6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    text varchar(500),
    reg_date TIMESTAMP,
    idArticle INT(6),
    idCustomer INT(6),
}

ALTER TABLE COMMENT 
ADD CONSTRAINT FK_CustomerComment
FOREIGN KEY (idCustomer) REFERENCES CUSTOMER(idCustomer);

ALTER TABLE COMMENT 
ADD CONSTRAINT FK_ArticleComment
FOREIGN KEY (idArticle) REFERENCES ARTICLE(idArticle);

CREATE TABLE RECOMMANDEDARTICLE (
    idRecommendedArticle INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    idArticle1 INT(6) NOT NULL,
    idArticle2 INT(6) NOT NULL,
    percentage DECIMAL,
    reg_date TIMESTAMP, 
)

ALTER TABLE RECOMMANDEDARTICLE
ADD CONSTRAINT UC_RECOMMANDEDARTICLE 
UNIQUE (idArticle1,idArticle2);

ALTER TABLE RECOMMANDEDARTICLE 
ADD CONSTRAINT FK_Article1RecommendedArticle
FOREIGN KEY (idArticle1) 
REFERENCES ARTICLE(idArticle);

ALTER TABLE RECOMMANDEDARTICLE 
ADD CONSTRAINT FK_Article2RecommendedArticle
FOREIGN KEY (idArticl2) 
REFERENCES ARTICLE(idArticle);

CREATE TABLE CART (
    idCustomer INT(6) UNSIGNED,
    idArticle INT(6) UNSIGNED,
    FOREIGN KEY (idCustomer) REFERENCES CUSTOMER(idCustomer),
    FOREIGN KEY (idArticle) REFERENCES ARTICLE(idArticle),
    FOREIGN KEY (idCustomer, idArticle)
)