<?php
    if($_SERVER["RESQUEST_METHOD"] === "POST"){
        if(isset($_POST["modify"])){
            $pdo = new PDO("mysql:host=database:3306;dbname=db_blog_novembre","root","password");

            $user_id = $_SESSION["user"]["id"];
            $content = filter_input(INPUT_POST, "modify");
            $article_id = filter_input(INPUT_POST,"id");

            $maRequete = $pdo->prepare("UPDATE `post` SET `body` = :oneData WHERE `id` = :id");
            $maRequete->execute([
                ":oneData"=>$content,
                ":article_id"=>$article_id
            ]);
        }
    }

    header("Location: /php_partial/timeline.php");
?>