<?php

require 'utils.php';

// Connexion à la base de données
require 'connection.php';
require 'models/orders_model.php';

// $db = getConnection();

// // Récupération de tous les employés
// $query = $db->prepare(
//     'SELECT emp.employeeNumber, emp.lastName, emp.firstName, emp.email, emp.jobTitle, off.city, man.firstName AS managerFirstName, man.lastName AS managerLastName
//     FROM employees emp
//     INNER JOIN offices off ON emp.officeCode = off.officeCode
//     LEFT JOIN employees man ON emp.reportsTo = man.employeeNumber
//     ORDER BY emp.firstName'
// );

// $query->execute();

// $employees = $query->fetchAll();

/*$orders = getOrders();*/
$currentId = $_GET['id'];
$order = getOrder($currentId);
$total = getTotal($currentId);



if ($order === false){
    require '404.phtml';
    http_response_(404);
    die();
}

// Affichage
// $template = 'employee.phtml';
// require 'layout.phtml';

showView('detail_order.phtml', ['order' => $order, 'total' => $total]);