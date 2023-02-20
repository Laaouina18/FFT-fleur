<?php

require "database.php";
$dsn = 'mysql:host=localhost;dbname=fft_fleur;charset=utf8mb4';
$db = new Database($dsn);

$taches = $db->query("update taches set status = :status where id = :id  ",[
    "id"=>$_GET['id'],
    "status"=>$_GET['update']
    ]);


header('Location: ./home.php');
exit;
