SELECT `products`.*, `categories`.`sid` 
FROM `products` 
JOIN `categories` 
ON `products`.`category_sid` = `categories`.`sid`;

SELECT `products`.*, `categories`.`name` 
FROM `products` 
JOIN `categories` 
ON `products`.`category_sid` = `categories`.`sid`;


SELECT p.*, c.`name` 
FROM `products`  AS p
JOIN `categories`  AS c
ON p.`category_sid` = c.`sid`;

SELECT p.*, c.`name`  AS 分類名稱 -- 會霸搜索欄位改成分類名稱
FROM `products`  AS p
JOIN `categories`  AS c
ON p.`category_sid` = c.`sid`;

SELECT p.*, c.`name` 分類名稱
FROM `products` p
JOIN `categories` c
ON p.`category_sid` = c.`sid`;

SELECT p.*, c.`name` 分類名稱 ,c.`sid` 
FROM `products` p 
LEFT JOIN `categories` c 
ON p.`category_sid` = c.`sid`;


SELECT   p.*, c.`name` 分類名稱 ,c.`sid`
FROM `categories` c
LEFT JOIN `products` p
ON p.`category_sid` = c.`sid`;

SELECT   p.*, c.`name` 分類名稱 
FROM `products` p
	LEFT JOIN `categories` c
		ON p.`category_sid` = c.`sid`
WHERE c.`sid` IS NULL;

SELECT   p.*, c.`name` 分類名稱 
FROM `products` p
	LEFT JOIN `categories` c
		ON p.`category_sid` = c.`sid`
WHERE c.`sid` IS NOT NULL;

SELECT * FROM `products` 
WHERE `author` LIKE '%陳%' 
OR `bookname` LIKE '%設計%';
--作者內文有陳或是書名有設計的都會被選到

SELECT * FROM `products` 
WHERE `author` LIKE '%陳%' 
AND `bookname` LIKE '%設計%';
--作者內文有陳且書名有設計的才會被選到

SELECT * FROM `products` WHERE `sid` IN (6,2,3);

SELECT * FROM `products` WHERE `sid` IN (6,2,3,8,20) ORDER BY `sid` DESC;

SELECT * FROM `products` WHERE `sid` IN (6,2,3,8,20) ORDER BY RAND();

SELECT COUNT(1) FROM `products`;
-- 1代表每個資料，共有幾筆

SELECT SUM(`price`) FROM `products` WHERE sid IN (1,2,3);

