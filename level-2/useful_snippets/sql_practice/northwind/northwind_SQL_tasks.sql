use northwind;

/*SELECT*/

-- select all employees
SELECT * FROM `employees` ORDER BY id

-- select all employee names; use alias for both tables and columns
SELECT CONCAT(first_name, ' ', last_name) as FullName FROM `employees`

-- || select all job titles; get them uniquely
SELECT DISTINCT job_title FROM employees ORDER BY job_title

-- select all employees that work as coordinators, 'Sales Coordinator'
SELECT * FROM employees WHERE job_title like 'Sales Coordinator' ORDER BY job_title

-- select all employees that do not work as coordinators
SELECT * FROM employees WHERE job_title not like 'Sales Coordinator' ORDER BY job_title

-- select all order details that have quantity bigger than 50; select just quantity and distinct it
SELECT DISTINCT quantity FROM `order_details` WHERE quantity > 50 ORDER BY quantity

-- select employees with notes / without notes
SELECT * FROM `employees` WHERE notes is null -- no notes
SELECT * FROM `employees` WHERE notes is not null -- with notes

-- select all unique categories from the products
SELECT DISTINCT category FROM `products` ORDER BY category

-- select all sauces from the products
SELECT * FROM `products` WHERE category like 'Sauces' ORDER BY category

-- select all beverages from products that have minimum reorder quantity
SELECT * FROM `products` WHERE minimum_reorder_quantity is not null

-- select all beverages from products that have minimum reorder quantity or target level above 60
SELECT * FROM `products` WHERE (minimum_reorder_quantity is not null OR target_level > 60) AND category like 'Beverages' ORDER BY id

-- select products with price between 20 and 100
SELECT * FROM `products` WHERE list_price BETWEEN 20 and 100 ORDER BY list_price

-- select products with product name between names 'Northwind Traders Clam Chowder' and 'Northwind Traders Marmalade';
SELECT * FROM `products` WHERE product_name BETWEEN 'Northwind Traders Clam Chowder' and 'Northwind Traders Marmalade' ORDER BY product_name

-- select employees that are either from Seattle or Redmond
SELECT * FROM `employees` WHERE city in ('Seattle', 'Redmond') ORDER BY city

-- select all products that were purchased
--|| For a product to be purchased it has to be in a purchase order
SELECT DISTINCT p.supplier_ids, p.id, p.product_code, p.product_name, p.description, p.standard_cost, p.list_price, p.reorder_level, p.target_level, p.quantity_per_unit, p.discontinued, p.minimum_reorder_quantity, p.category 
FROM `products` as p join purchase_order_details as pod on p.id = pod.product_id ORDER BY p.product_name 

-- add several order by's - done

/*GROUP BY*/

-- aggregate functions - count the customers. Add where
SELECT COUNT(*) FROM `customers` WHERE first_name is not null

-- find the cheapest and most expensive products. What is the average price of a product?
SELECT MIN(list_price) as min_price, product_name FROM `products` GROUP by product_name ORDER BY min_price limit 1 -- cheapest 
SELECT MAX(list_price) as max_price, product_name FROM `products` GROUP by product_name ORDER BY max_price DESC LIMIT 1 -- most expensive  
SELECT AVG(list_price) as avg_price FROM `products` -- average price

-- find how many products are purchased at all
SELECT COUNT(*) FROM (SELECT DISTINCT p.id FROM `products` as p join purchase_order_details as pod on p.id = pod.product_id ORDER BY p.product_name) as CountProductsPurchased 

-- find also the product names - done
 
 -- how many customers are from Seattle?
SELECT COUNT(*) FROM `customers` WHERE city = 'Seattle'
 
-- what are the cities with more then 2 customers?
SELECT COUNT(*) as counted_cities, city FROM `customers` GROUP BY city HAVING counted_cities > 2 -- none
SELECT COUNT(*) as counted_cities, city FROM `customers` GROUP BY city HAVING counted_cities >= 2 -- having more or equal to two

/*JOIN*/

-- inner join customers and orders -  c.id as customer_id, c.first_name, c.company, c.city, o.id as order_id, o.order_date, o.shipped_date 
SELECT c.id as customer_id, c.first_name, c.company, c.city, o.id as order_id, o.order_date, o.shipped_date FROM customers c INNER JOIN orders o on c.id = o.customer_id 

-- left join customers and orders
SELECT * FROM customers c LEFT JOIN orders o on c.id = o.customer_id 

-- right join customers and orders
SELECT * FROM customers c RIGHT JOIN orders o on c.id = o.customer_id 

-- select all products that were purchased with name, quantity, cost and date - show join
SELECT p.product_name, pod.quantity, pod.unit_cost, p.standard_cost, p.list_price, pod.date_received
FROM `products` as p 
JOIN purchase_order_details as pod on p.id = pod.product_id ORDER BY p.product_name

-- find out which employees have what priviledges; test left and right joins
SELECT *
FROM employees e
JOIN employee_privileges ep on e.id = ep.employee_id
JOIN `privileges` as p on p.id = ep.privilege_id

-- find customers that are from USA and are not from USA
SELECT * FROM employees
WHERE country_region = 'USA' -- from usa

SELECT * FROM employees
WHERE country_region != 'USA' -- not from usa

-- list the employees that have registered more than 10 orders - join + aggregation
SELECT COUNT(e.id) as times_purchased, e.id, e.first_name, e.last_name FROM `employees` as e 
JOIN orders as o on e.id = o.employee_id GROUP BY e.id HAVING times_purchased > 10 

/*INSERT, UPDATE, DELETE*/

-- add new privilege - select, insert all, by columns. 'Send Newsletter', 'Order Approvals'
SELECT * FROM `privileges` 

INSERT INTO `privileges` (privilege_name)
VALUES ('Send Newsletter'), ('Order Approvals')

-- insert new customers from suppliers - first_name, last_name, city, country_region
INSERT INTO customers (company, last_name, first_name, email_address, job_title, business_phone, home_phone, mobile_phone, fax_number, address, city, state_province, zip_postal_code, country_region, web_page, notes,attachments)
VALUES ('Company AA', 'Peterson', 'Ann', 'ann@vsc.com', 'Product Manager', '(123)555-0101', null, null, '(123)555-0102', '456 19th Street', 'Miami', 'FL', 20400, 'USA', null, null, null)

-- update new customers' company (look up the id)
UPDATE customers SET company = 'Company XYZ'
WHERE id = (SELECT id FROM `customers` WHERE first_name = 'Ann' LIMIT 1)

-- update customers with id between 30 and 36 with note that tey're contrasctors.
UPDATE customers
SET notes = 'Is a contractor.'
WHERE id BETWEEN 30 and 36

-- remove customers without city
DELETE FROM `customers`  
WHERE city is null
