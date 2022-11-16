<?php
$pdo = new PDO("mysql:host=database:3306;dbname=db_blog","root","root");
$message="";
session_start();
// inscription
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $identifiant = filter_input(INPUT_POST, "identifiant");
    $identifiant = filter_input(INPUT_POST, "email");
    $mdp =  filter_input(INPUT_POST, "password");
    $confirmMdp = filter_input(INPUT_POST, "confirmPassword");

 
    if ($mdp == $confirmMdp) {
        $maRequete = $pdo->prepare("INSERT INTO `user` (`nickname`, `password`, `email`) VALUES(:identifiant ,:mdp, :email);");
        $maRequete->execute([
            ":identifiant" => $identifiant,
            ":mdp" => $mdp,
            ":email" => $email
        ]);

        $user = $maRequete->fetch();
     
        $_SESSION["user"] = $user;

   
        
    }
        else {
        $message = "Les mots de passe ne correspondent pas";
        http_response_code(403);
    }
}
?>