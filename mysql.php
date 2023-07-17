<?php

// Выведите id и названия всех товаров, которые имеют все возможные теги в этой базе.
SELECT id, name FROM goods WHERE NOT EXISTS
    ( SELECT id FROM tags WHERE NOT EXISTS
         ( SELECT tag_id FROM goods_tags WHERE goods_tags.goods_id = goods.id AND goods_tags.tag_id = tags.id )
);


//Выбрать без join-ов и подзапросов все департаменты, в которых есть мужчины, и все они (каждый) поставили высокую оценку (строго выше 5).
SELECT department_id
FROM evaluations
WHERE gender = true
GROUP BY department_id
HAVING MIN(value) > 5;
