-- polo 1 fait 
-- https://www.looksgud.in/blog/different-types-of-t-shirts-men/#Polo T-Shirt
  
INSERT INTO `article`
(`libelle`, `price`, `quantity`, `article_size`, `color`, `reg_date`,
`idType`, `idBrand`, `idMedia`) 
VALUES 
('Celio Navy & Green Slim Fit Polo T-shirt',950,5,'L','Navy blue', CURRENT_TIMESTAMP,
 1,3,4);
 
INSERT INTO `brand`(`brand_name`, `reg_date`) VALUES ('DENIM',CURRENT_TIMESTAMP);
INSERT INTO `brand`(`brand_name`, `reg_date`) VALUES ('Yukth',CURRENT_TIMESTAMP);
INSERT INTO `brand`(`brand_name`, `reg_date`) VALUES ('Unknown',CURRENT_TIMESTAMP);
INSERT INTO `brand`(`brand_name`, `reg_date`) VALUES ('Metronaut',CURRENT_TIMESTAMP);
 
 
/*
articleType
id type libelle
						1		DUKE
						2		WROGN
						3		CELIO
						4		DNMX
						5		DENIM
						6		Yukth
						7		Unknown
						8		Metronaut
10		U NECK/SCOOP NECK
*/
INSERT INTO `article`
(`libelle`, `price`, `quantity`, `article_size`, `color`, `reg_date`,
`idType`, `idBrand`, `idMedia`) 
VALUES 
('KOOVS Extreme Scoop Neck T-Shirt',399,5,'L','Green', CURRENT_TIMESTAMP,
 10,8,37);
INSERT INTO `article`
(`libelle`, `price`, `quantity`, `article_size`, `color`, `reg_date`,
`idType`, `idBrand`, `idMedia`) 
VALUES 
('KOOVS Scoop Neck T-Shirt',395,5,'L','Black', CURRENT_TIMESTAMP,
 10,1,38);
INSERT INTO `article`
(`libelle`, `price`, `quantity`, `article_size`, `color`, `reg_date`,
`idType`, `idBrand`, `idMedia`) 
VALUES 
('Blue Saint Exclusive Scoop Neck T-Shirt',399,5,'L','Blue Saint', CURRENT_TIMESTAMP,
 10,2,39);
 INSERT INTO `article`
(`libelle`, `price`, `quantity`, `article_size`, `color`, `reg_date`,
`idType`, `idBrand`, `idMedia`) 
VALUES 
('KOOVS Extreme Scoop Neck T-Shirt',399,5,'L','Kind of white', CURRENT_TIMESTAMP,
 10,3,40);