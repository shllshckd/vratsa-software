INSERT INTO table_name (column_1, column_2, ...) 
VALUES (value_1, value_2, ...)
// '' for strings
// no '' for integers

INSERT INTO `recipes` (`recipe_name`, `preparation_description`, `preparation_time`, `recipe_category_id`) 
VALUES ('Супа пиле', 'Вкусно ястие', 45, 1) 

INSERT INTO `recipes` (`recipe_name`, `preparation_description`, `preparation_time`, `recipe_category_id`, `date_created`)
VALUES ('Пиле Жулиен', 'Вкусно пиле на име Жулиен' , 105, 8, '2021-02-22')

INSERT INTO recipes (recipe_name, preparation_description, preparation_time, recipe_category_id)
VALUES ('Пъстърва на скара', 'Вкусна риба', 60, 8)

--------

CURDATE() -- 2021-04-17
NOW() -- 2021-04-17 13:11:30

--------

SELECT * FROM table_name

SELECT column_1, column_2, ...
FROM table_name

SELECT column_1, column_2, ...
FROM table_name
WHERE expression

SELECT recipe_name, preparation_description, preparation_time
FROM `recipes`

SELECT recipe_name, preparation_description, preparation_time
FROM `recipes`
WHERE recipe_id = 5 

SELECT recipe_name, preparation_description, preparation_time 
FROM `recipes` 
WHERE recipe_name LIKE '%т%'

--------

SELECT recipe_name, preparation_description, preparation_time 
FROM `recipes` 
WHERE preparation_time > 20

SELECT *
FROM `recipes` 
WHERE preparation_time > 20 
  AND date_deleted is null

SELECT *
FROM `recipes` 
WHERE preparation_time > 20 
  AND recipe_name = 'Лазаня' 
   OR recipe_name = 'Таратор' 

SELECT * 
FROM `recipes` 
WHERE recipe_name 
LIKE '%жулиен%'

SELECT * 
FROM `recipes` 
WHERE recipe_name 
LIKE '%жулиен_'

--------

UPDATE table_name
SET column_1 = value_1, column_2 = value_2  
WHERE expression

UPDATE recipes
SET recipe_name = 'Пъстърва на скара'
WHERE recipe_id = 1 

UPDATE `recipes` 
SET `preparation_description` = 'Просто ястие' 
WHERE `recipes`.`recipe_id` = 3

UPDATE recipes
SET date_deleted = null
WHERE date_deleted IS NOT NULL

--------

DELETE FROM table_name
WHERE expression

DELETE FROM recipes
WHERE recipe_name = 'Палачинки'

DELETE FROM recipes
WHERE recipe_id = 2

DELETE FROM `recipes` 
WHERE recipe_name = 'Пъстърва на скара'

-------- limit and offset

LIMIT row_count (how much rows to show)
OFFSET offset (after how much rows)

--------

SELECT preparation_time, COUNT(preparation_time)
FROM recipes
GROUP BY preparation_time

SELECT preparation_time, COUNT(preparation_time) AS counted_preparation_time
FROM recipes
GROUP BY preparation_time

-- having
SELECT preparation_time, COUNT(preparation_time) AS counted_preparation_time
FROM recipes
GROUP BY preparation_time
HAVING counted_preparation_time > 1

INSERT INTO recipes (recipe_name, preparation_description, preparation_time, recipe_category_id, date_created)
VALUES ('тестово 2', 
        'някакво ястие', 
        60, 
		(SELECT `recipe_category_id` from recipe_categories where recipe_category_name = 'предястия'), 
        CURDATE()
)

--
SELECT * FROM `employees` 
WHERE Salary = (SELECT MIN(Salary) FROM employees  )
ORDER BY Salary ASC

--- recipes crud

SELECT 
r.recipe_name,
r.prep_description,
r.prep_time,
r.date_created,
r.date_deleted,
rc.recipe_category_name,
rp.product_quantity,
p.product_name,
p.product_image,
p.product_price,
p.product_calories,
p.date_deleted as product_date_deleted,
pc.product_category_name as product_category_name,
u.unit_name
from recipes as r 
left join recipe_categories as rc 
	on r.recipe_category_id = rc.recipe_category_id
left join recipes_products as rp 
	on rp.recipe_id = r.recipe_id
left join units as u
	on u.unit_id = rp.unit_id
left join products as p 
	on p.product_id = rp.product_id
left join product_categories as pc
	on pc.product_category_id = p.product_category_id

