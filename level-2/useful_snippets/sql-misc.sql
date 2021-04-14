-- Order of evaluation
FROM -> WHERE -> SELECT -> GROUP BY -> HAVING -> ORDER BY ->LIMIT

--------------------------------------

SELECT count(*)
FROM recipes

SELECT count(*) as 'count', product_name FROM `products`
GROUP by product_category_id

-----

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
