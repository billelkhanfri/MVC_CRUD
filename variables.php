

<?php

$employeeStatement = $mysqlClient->prepare('SELECT * FROM employee');

$employeeStatement->execute();

$employee = $employeeStatement->fetchAll();










