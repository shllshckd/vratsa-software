-- 1 - Пребройте продуктите в БД започващи с буквата “Б”
-- SELECT COUNT(*) FROM `products` WHERE `product_name` like 'Б%' and date_deleted is null

-- 2 - Изведете информация за рецептите в категория ‘Супи’, включително информация за продуктите за всяка рецепта.
-- Отстранете от заявката повтарящата се информация - например първичните ключове на всяка от таблиците.
/*
SELECT r.recipe_id, r.recipe_name, r.prep_time, r.prep_description, r.date_created,
		 rc.recipe_category_name,
         rp.product_quantity, rp.unit_id,
         p.product_name, p.product_price, p.product_calories ,
         u.unit_name
    FROM recipes AS r
join recipe_categories as rc on rc.recipe_category_id = r.recipe_category_id
join recipes_products as rp on rp.recipe_id = r.recipe_id
join products as p on p.product_id = rp.product_id
join units as u on u.unit_id = rp.unit_id
  where rc.recipe_category_name = 'супи'
*/

-- 3 - Пребройте рецептите по типове ястия–в резултатът да са видими и имената на типовете ястия
/*
SELECT COUNT(r.recipe_id) as 'count_of_recipes_in_category', rc.recipe_category_name
FROM recipes AS r
JOIN recipe_categories AS rc on r.recipe_category_id = rc.recipe_category_id
GROUP BY r.recipe_category_id
*/

-- 4 - Изведете името и времето за приготвяне на двете най-стари рецепти, въведени в базата данни.
-- SELECT recipe_name, prep_time FROM recipes ORDER BY date_created ASC LIMIT 2