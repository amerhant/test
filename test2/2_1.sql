SELECT `books`.`id`, `books`.`name` FROM `authors_books` 
JOIN `books` ON `books`.`id` = `authors_books`.`id_book` GROUP BY `id_book` HAVING COUNT(*) = 2 