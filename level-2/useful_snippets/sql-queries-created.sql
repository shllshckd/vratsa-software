INSERT INTO table_name (column_1, column_2, ...) 
VALUES (value_1, value_2, ...)

INSERT INTO `recipes` (`recipe_name`, `preparation_description`, `preparation_time`, `recipe_category_id`) 
VALUES ('Супа пиле', 'Вкусно ястие', 45, 1) 

INSERT INTO `recipes` (`recipe_name`, `preparation_description`, `preparation_time`, `recipe_category_id`, `date_created`)
VALUES ('Пиле Жулиен', 'Вкусно пиле на име Жулиен' , 105, 8, '2021-02-22')

INSERT INTO recipes (recipe_name, preparation_description, preparation_time, recipe_category_id)
VALUES ('Пъстърва на скара', 'Вкусна риба', 60, 8)

--------

CURDATE()
NOW()

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

--------

LIMIT row_count (how much rows to show)
OFFSET offset (after how much rows)

--------

SELECT preparation_time, COUNT(preparation_time)
FROM recipes
GROUP BY preparation_time

SELECT preparation_time, COUNT(preparation_time) AS counted_preparation_time
FROM recipes
GROUP BY preparation_time

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
WHERE Salary = (
	SELECT MIN(Salary) FROM employees  
)
ORDER BY Salary ASC

