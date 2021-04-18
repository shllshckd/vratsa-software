-- 1 - Пребройте продуктите в БД започващи с буквата “Б”
-- SELECT COUNT(*) FROM `products` WHERE `product_name` like 'Б%' and date_deleted is null

-- 2 - Изведете информация за рецептите в категория ‘Супи’, включително информация за продуктите за всяка рецепта.
-- Отстранете от заявката повтарящата се информация - например първичните ключове на всяка от таблиците.
/*

SELECT r.recipe_id, r.recipe_name, r.prep_time, r.prep_description, r.date_created,
	   rc.recipe_category_name,
       rp.product_quantity, rp.unit_id,
       p.product_name, p.product_price, p.product_calories ,
       pc.product_category_name,
       u.unit_name
FROM recipes AS r
JOIN recipe_categories AS rc ON rc.recipe_category_id = r.recipe_category_id
JOIN recipes_products AS rp ON rp.recipe_id = r.recipe_id
JOIN products AS p ON p.product_id = rp.product_id
JOIN product_categories AS pc on p.product_category_id = pc.product_category_id
JOIN units AS u ON u.unit_id = rp.unit_id
WHERE rc.recipe_category_name = 'супи' AND date_deleted IS NULL
*/

-- 3 - Пребройте рецептите по типове ястия–в резултатът да са видими и имената на типовете ястия
/*
SELECT COUNT(r.recipe_id) as 'count_of_recipes_in_category', rc.recipe_category_name
FROM recipes AS r
JOIN recipe_categories AS rc ON r.recipe_category_id = rc.recipe_category_id
WHERE r.date_deleted IS NULL
GROUP BY r.recipe_category_id
*/

-- 4 - Изведете името и времето за приготвяне на двете най-стари рецепти, въведени в базата данни.
-- SELECT recipe_name, prep_time FROM recipes WHERE date_deleted is null ORDER BY date_created ASC LIMIT 2