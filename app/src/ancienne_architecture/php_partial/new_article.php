<?php
session_start();
$pdo = new PDO("mysql:host=database:3306;dbname=db_blog_novembre","root","password");
$user_id = $_SESSION["user"]["user_id"];

if($_SERVER["REQUEST_METHOD"] === "POST"){
    if(isset($_POST["newArticle"])){
        $text = filter_input(INPUT_POST, "newArticle");

        $maRequete = $pdo->prepare(
            "INSERT INTO `post` (`body`,`user`)
            VALUES(:content, :userId)");
        $maRequete->execute([
            ":content" => $text,
            ":userId" => $user_id
        ]);
    }
}
header("Location: /php_partial/timeline.php");
?>