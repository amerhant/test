SELECT `authors`.`id`,`authors`.`name` FROM `authors`
JOIN `authors_books` ON `authors`.`id`=`authors_books`.`id_author`
JOIN `reviews` ON `authors_books`.`id_book`=`reviews`.`id_book` 
AND `reviews`.`id_book` NOT IN (SELECT `id_book` FROM `reviews` WHERE `reviews`.`raiting`<4 GROUP BY `id_book`) 
GROUP BY `authors_books`.`id_author` HAVING AVG(`reviews`.`raiting`)>7