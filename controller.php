<?php
require "database.php";
$dsn = 'mysql:host=localhost;dbname=fft_fleur;charset=utf8mb4';
$db = new Database($dsn);



if(isset($_POST)){

$description = $_POST['description'];
$status = "todo";


// préparer la requête SQL
if(isset($_POST["save"])){
$sql = "INSERT INTO taches (description, status) VALUES (:description, :status)";

$stmt = $db->query($sql,[
    "description"=>$description,
    "status"=>$status
]);





}


// exécuter la requête

header('Location: ./home.php');
exit;

}



