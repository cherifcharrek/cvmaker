<?php
session_start(); 

require_once 'connexion.php';

if (isset($_POST['email']) && isset($_POST['password'])) { 
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    $req = $cnx->prepare("SELECT * FROM Users WHERE email=:email");
    $req->execute(array(':email' => $email));
    $enreg = $req->fetch(PDO::FETCH_ASSOC);

    if ($enreg && password_verify($password, $enreg['password'])) { 
        $_SESSION['ok'] = "ok";
        $_SESSION["user"] = $enreg["email"];
        $_SESSION["password"] = $enreg["password"];

        header("Location: Espace_admin.php");
        exit(); 
    } else {
        echo "Echec d'authentification! Réessayer";
 
        echo "<script > document.location.href='index.php'; </script>";
        exit(); 
    }
}
?>





<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="login.css">
</head>
<header> <div>bienvenue sur notre site</div> </header>
<style>
    header {
    background-color: #4f8abd; 
    text-align: center;
    padding: 20px 0; 
}

header div {
    color: white; 
    font-size: 50px; 
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: "Roboto", sans-serif;
    background-color: #f4f4f4;
}

.login-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-form {
    background-color: #fff;
    padding: 40px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.login-form h2 {
    margin-bottom: 20px;
    text-align: center;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

.form-group input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

button[type="submit"] {
    display: block;
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #4f8abd;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #357a9e;
}


    </style>
<body>




<div class="login-container">

    <form action="kdkd.php" method="POST" class="login-form">   
        <h2>Connexion</h2>
        <div class="form-group">
            <label for="username">E-mail :</label>
            <input type="email" id="email" name="email" placeholder="contact@gmail.com" required>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" name="cree">Se connecter</button>
        <a href="sig.php" id="creer">Créer un compte</a>
    </form>
</div>



</body>
</html>

