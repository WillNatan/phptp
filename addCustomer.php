<?php
require_once('models/Client.php');
require_once('./database.php');

$client=new Client();
$client->setNom($_POST["nom"]);
$client->setPrenom($_POST["prenom"]);
$client->setVille($_POST["ville"]);
$client->setTelephone($_POST["tel"]);
$client->setDate_dernier_achat(  date("Y-m-d"));
$client->setPortefeuille($_POST["portefeuille"]);

function dismount($object) {
    $reflectionClass = new ReflectionClass(get_class($object));
    $array = array();
    foreach ($reflectionClass->getProperties() as $property) {
        $property->setAccessible(true);
        $array[$property->getName()] = $property->getValue($object);
        $property->setAccessible(false);
    }
    return $array;
}


$query = ("INSERT INTO client (nom,prenom,telephone,ville,portefeuille, date_dernier_achat) VALUES (:nom, :prenom, :tel, :ville, :portefeuille, :date)");
$request = $db->prepare($query);
var_dump(dismount($client));

//header("Location: index.php");