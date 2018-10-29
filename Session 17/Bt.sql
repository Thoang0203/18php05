SELECT * FROM products p
INNER JOIN categories c
ON p.categoryID = c.categoryID
WHERE listPrice >500 AND c.categoryName = 'Guitars';

SELECT * FROM `products` 
WHERE dateAdded LIKE '2014-07-%' 
	AND listPrice > 300 
ORDER BY listPrice DESC;

SELECT * FROM products p
INNER JOIN categories c
ON c.categoryID = p.categoryID
WHERE productName LIKE '%o%'
	AND c.categoryName = 'Basses'
ORDER BY listPrice DESC;

SELECT * FROM products p
INNER JOIN orderitems oi
ON p.productID = oi.productID
INNER JOIN orders o
ON o.orderID= oi.orderID
INNER JOIN customers c
ON c.customerID = o.customerID
WHERE c.emailAddress LIKE '%@gmail.com';

SELECT * FROM `products`
WHERE listPrice > 300
	AND dateAdded LIKE '2014-%'
ORDER BY listPrice DESC
LIMIT 4;

SELECT `line1`, `line2`, `city`, `state` FROM addresses a
INNER JOIN customers c
ON c.customerID = a.customerID
INNER JOIN orders o
ON o.customerID = c.customerID
INNER JOIN orderitems oi
ON o.orderID = oi.orderID
INNER JOIN products p
ON p.productID = oi.productID
WHERE p.productName = 'Yamaha FG700S';