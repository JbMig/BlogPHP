<?php
session_start();
$pdo = new PDO("mysql:host=database:3306;dbname=db_blog_novembre","root","password");
$user_id = $_SESSION["user"]["user_id"];
$articles=[];

$maRequete = $pdo -> prepare("SELECT * FROM `post`");
$maRequete -> execute();
$articles = $maRequete->fetchAll(PDO::FETCH_ASSOC);


require_once __DIR__ . "/../html_partial/timeline_html.php";
?>