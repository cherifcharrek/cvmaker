<?php
require_once 'connexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $email = $_POST['email'];
    $password = $_POST['password'];
    
 
    $sql = "INSERT INTO users (mail, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email, $password]);
    
    
    header("Location: bbb.php");
    exit(); 
}
?>
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>

    </style>
      
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="signup.css">
  <title>Sign Up - CV Generator</title>
</head>
<header> <div>bienvenue sur notre site</div> </header>
<body>
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
    * {   margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    
    body {
        font-family: "Roboto", sans-serif;
        background-color: #f4f4f4;
    }
    
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    
    form {
        background-color: #fff;
        padding: 40px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 300px;
    }
    
    h2 {
        margin-bottom: 20px;
        text-align: center;
    }
    
    .input-group {
        margin-bottom: 20px;
    }
    
    .input-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }
    
    .input-group input {
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
    
    p {
        text-align: center;
        margin-top: 20px;
    }
    
    a {
        color: #4f8abd;
        text-decoration: none;
    }
    
    a:hover {
        text-decoration: underline;
    }
    </style>
  <div class="container">
    <form action="sgin.php">
      <h2>Sign Up</h2>
      <div class="input-group">
        <label for="nom">nom</label>
        <input type="text" id="nom" name="nom" required>
      </div>
      <div class="input-group">
        <label for="email">email</label>
        <input type="tel" id="email" name="email" required>
      </div>
      <div class="input-group">
        <label for="motdepasse">motdepasse</label>
        <input type="password" id="motdepasse" name="motdepasse" required>
      </div>
      <input type="submit" value="creer un compte"   ></button>
      
  </div>
  </form>
</body>
</html>