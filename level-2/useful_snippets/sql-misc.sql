-- Order of evaluation
FROM -> WHERE -> SELECT -> GROUP BY -> HAVING -> ORDER BY ->LIMIT
-------------------------------------
SELECT COUNT(*)
FROM recipes

SELECT COUNT(*) as 'count', product_name FROM `products`
GROUP by product_category_id
------------

DELETE FROM `table` WHERE column1 = value1

-------------
INSERT INTO `table` (column1, column2, column3)
VALUES (value1, value2, value3)

UPDATE `table` 
SET column1=value1, column2=value2, column3=value3

------------

SELECT NOW()
SELECT CURDATE()

------------
SELECT COUNT(*) FROM products
SELECT COUNT(*) FROM units
SELECT COUNT(*) FROM products WHERE product_name LIKE '%мляко%'
SELECT COUNT(*) FROM products WHERE product_name LIKE '%сок%' 

SELECT COUNT(*) FROM products 
GROUP by product_calories

SELECT AVG(product_price) as average_price
FROM products 

-- working query
SELECT AVG(product_price) as average_price, product_category_id 
FROM products GROUP BY product_category_id

-- working query
SELECT AVG(product_calories) as average_calories, product_category_id
FROM products GROUP BY product_category_id

-- working query
SELECT AVG(product_price) as avg_milk_price, product_category_id 
FROM products 
WHERE product_name LIKE '%мляко%' 
GROUP BY product_category_id

--- working query
SELECT COUNT(product_id) as num_products, product_calories FROM products 
GROUP by product_calories

--- working query
SELECT COUNT(product_id) as num_products, product_price 
FROM products 
GROUP BY product_price

--- working query
SELECT COUNT(product_id) as products_in_category, product_category_id
FROM products 
GROUP BY product_category_id

--- working query
SELECT MAX(product_calories) as max_calories, product_category_id 
FROM products 
GROUP BY product_category_id

--- working query
SELECT MAX(product_calories)
FROM products

--- working query
SELECT MAX(product_calories) as max_calories, product_category_id 
FROM products 
GROUP BY product_category_id 
ORDER BY max_calories DESC LIMIT 1 

--- order by demo
SELECT *
FROM products 
ORDER BY max_calories DESC, recipe_name ASC

--- like
SELECT column1, column2
FROM `table` 
WHERE `column1` like '%string%'

--- working query
SELECT * FROM products 
WHERE product_price > (SELECT AVG(product_price) FROM products) 

--- working query
SELECT * FROM products
WHERE product_calories < (SELECT AVG(product_calories) FROM products)

--- ?
SELECT * 
FROM products 
GROUP BY product_price

--------------------------------------

SELECT COUNT(CustomerID), Country
FROM Customers
GROUP BY Country;

SELECT COUNT(CustomerID), Country
FROM Customers
GROUP BY Country
ORDER BY COUNT(CustomerID) DESC;
---------------------------------------

SELECT *
FROM products
LIMIT row_count 
OFFSET offset

LIMIT 3,4 -- offset 3, take 4
---------------------------


