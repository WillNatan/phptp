<?php
include_once("database.php");

if (isset($_GET['page']) && !empty($_GET['page'])) {
    $currentPage = $_GET['page'];
} else {
    $currentPage = 1;
}


$reqNbCustomers = $db->query('SELECT COUNT(*) as nb_customers from client');
$reqNbCustomers->execute();
$nbCustResult = $reqNbCustomers->fetch();

$parPage = 10;

$premier = ($currentPage * $parPage) - $parPage;



if (isset($_GET['search']) && !empty($_GET['search'])) {
    $search = $_GET['search'];
    $request = $db->prepare("SELECT * from client WHERE prenom=:prenom LIMIT $premier, $parPage");
    $request->bindParam("prenom",$search);
    $request->execute();
    $request->setFetchMode(PDO::FETCH_CLASS, 'Client');
    $customers = $request->fetchAll();
    $pages = count($customers) / $parPage;

} else {
    $request = $db->query("SELECT * from client LIMIT $premier, $parPage");
    $request->setFetchMode(PDO::FETCH_CLASS, 'Client');
    $customers = $request->fetchAll();
    $pages = $nbCustResult['nb_customers'] / $parPage;
}


