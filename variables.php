

<?php

$employeeStatement = $mysqlClient->prepare('SELECT * FROM film_list');

$employeeStatement->execute();

$films = $employeeStatement->fetchAll();










