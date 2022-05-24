SELECT c.`sid`, c.`name`,count(1) num 
FROM `products` p 
JOIN `categories` c 
ON p.`category_sid` = c.sid 
GROUP BY p.category_sid;

SELECT c.`sid`, c.`name`,count(1) num 
FROM `products` p 
LEFT JOIN `categories` c 
ON p.`category_sid` = c.sid 
GROUP BY p.category_sid;

--取得單筆訂單
SELECT o.* ,od.price, od.quantity, p.bookname
FROM `orders` o 
    JOIN `order_details` od
    ON o.sid = od.order_sid
    JOIN `products` p
    ON p.sid = od.product_sid
WHERE o.sid=10;

--取得單一會員訂單 並由訂單日期降冪排列(日期近的在最上面)
SELECT o.* ,od.price, od.quantity, p.bookname
FROM `orders` o 
    JOIN `order_details` od
    ON o.sid = od.order_sid
    JOIN `products` p
    ON p.sid = od.product_sid
WHERE o.member_sid=13
ORDER BY order_date DESC , o.sid;

-- 2017-01-01以後的所有訂單資料查詢
SELECT * 
FROM `orders` o 
WHERE o.order_date > '2017-01-01';

-- 2017-01-01~2019-01-01內的所有訂單資料查詢
SELECT * 
FROM `orders` o 
WHERE o.order_date >= '2017-01-01'
AND o.order_date < '2019-01-01';

-- 2017-10-03當天內的所有訂單資料查詢
SELECT * 
FROM `orders` o 
WHERE o.order_date >= '2017-10-03'
AND o.order_date < '2017-10-04';

-- 子查詢

-- 先建立查詢目標
SELECT `product_sid` 
FROM `order_details` 
WHERE `order_sid`=11;

-- 在進行所需資料的目標查詢
SELECT * 
FROM `products` 
WHERE `sid` 
IN (SELECT `product_sid` 
FROM `order_details` 
WHERE `order_sid`=11)

-- 先設定為一張資料表
SELECT `product_sid` ,`price`
FROM `order_details` 
WHERE `order_sid`=11;

-- 利用資料表進行查詢，因此依定要給資料表定義名稱
SELECT p.* , od.price od_price
FROM `products` p
    JOIN (SELECT `product_sid` ,`price`
FROM `order_details` 
WHERE `order_sid`=11) od
    ON p.sid = od.product_sid;

-- 產生categories的檢視表
CREATE VIEW view_test AS
SELECT * 
FROM `categories`

CREATE VIEW detail_view_test AS
SELECT od.*, p.bookname
FROM `order_details` od
	JOIN `products` p on od.product_sid = p.sid;


