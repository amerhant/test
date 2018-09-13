SELECT `books`.`id`,`books`.`name` FROM `books`
LEFT JOIN (SELECT DISTINCT `id_book` FROM `authors_books` 
WHERE `id_author` NOT IN(SELECT `id_author` FROM `authors_books` GROUP BY `id_author` HAVING COUNT(*)=1)) t2 ON `books`.`id`=t2.`id_book`
WHERE t2.`id_book` IS NULL