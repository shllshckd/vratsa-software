SELECT * FROM `recipes` as r 
JOIN recipe_categories as rc 
on r.recipe_category_id = rc.recipe_category_id = r.recipe_category_id

--- inner join | join
inner join or
join - returns results where there is a match on the specified cells / criteria
returns all rows when there is at least one match in both tables

-- left join 
left join - return all rows from left table, and matched rows from the right table

-- right join 
right join - return all rows from right table, and matched rows from the left table

-- full join 
full join - return all rows when there is a match in one of the tables

--- union
SELECT * FROM t1
LEFT JOIN t2 ON t1.id = t2.id
UNION
SELECT * FROM t1
RIGHT JOIN t2 ON t1.id = t2.id

--- union - above query is concatenated with below one, eliminating the repeating values
SELECT * FROM `recipes` as r 
LEFT OUTER JOIN recipe_categories as rc 
on r.recipe_category_id = rc.recipe_category_id = r.recipe_category_id
UNION
SELECT * FROM `recipes` as r 
RIGHT OUTER JOIN recipe_categories as rc 
on r.recipe_category_id = rc.recipe_category_id = r.recipe_category_id

--- same as before, UNION ALL says "don't remove repeating values"
SELECT * FROM `recipes` as r 
LEFT OUTER JOIN recipe_categories as rc 
on r.recipe_category_id = rc.recipe_category_id = r.recipe_category_id
UNION ALL
SELECT * FROM `recipes` as r 
RIGHT OUTER JOIN recipe_categories as rc 
on r.recipe_category_id = rc.recipe_category_id = r.recipe_category_id

--- Not recommended
SELECT * FROM `recipes`
NATURAL JOIN recipe_categories

-- should've worked but doesn't
SELECT a.recipe_name, a.date_created as recipe_date_created, 
	   b.recipe_category_name, 
	   c.product_quantity, 
	   d.product_name, d.product_calories, d.product_price
FROM recipes a 
LEFT JOIN recipe_categories b on a.recipe_category_id = b.recipe_category_id
INNER JOIN recipes_products c on a.recipe_id = c.recipe_id
LEFT JOIN products d on c.product_id d.product_id

-- should but doesnt
SELECT *
FROM recipes a 
LEFT JOIN recipe_categories b on a.recipe_category_id = b.recipe_category_id
LEFT JOIN recipes_products c on a.recipe_id = c.recipe_id
LEFT JOIN products d on c.product_id d.product_id
LEFT JOIN product_categories e on e.product_category_id = d.product_category_id


--- just so i have it idk

SELECT a.recipe_name, a.date_created as recipe_date_created, a.date_deleted as recipe_date_deleted, 
	   b.recipe_category_name, c.product_quantity, d.product_name, d.product_calories, d.product_price, e.product_category_name
FROM recipes a 
LEFT JOIN recipe_categories b on a.recipe_category_id = b.recipe_category_id
LEFT JOIN recipes_products c on a.recipe_id = c.recipe_id
LEFT JOIN products d on c.product_id d.product_id
LEFT JOIN product_categories e on e.product_category_id = d.product_category_id
WHERE date_deleted is null