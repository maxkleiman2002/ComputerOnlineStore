<?php

$host = "localhost";
$db = 'compshop';
$user = 'root';
$password = "";
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname = $db;charset = $charset";
$opt =[
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

$pdo = new PDO($dsn,$user,$password,$opt);