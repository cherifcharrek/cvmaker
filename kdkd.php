


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une information professionnelle</title>
    <style>
     body {
    font-family: Arial, sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
}

h2 {
    color: #333;
    text-align: center;
    margin-top: 50px;
}

form {
    max-width: 600px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

input[type="text"],
input[type="email"],
textarea,
input[type="date"],
input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

textarea {
    resize: vertical;
}

input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

.error {
    color: red;
}

.success {
    color: green;
}

    </style>
</head>
<body>
    <h2>Ajouter une nouvelle information professionnelle</h2>

   
    <form method="post" action="cv3.php">
     
        <input type="text" name="nom" placeholder="Nom" required><br>
        <input type="text" name="adresse" placeholder="Adresse" required><br>
        <input type="text" name="telephone" placeholder="Téléphone" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="text" name="competence" placeholder="Compétence"><br>
        <input type="text" name="entreprise" placeholder="Entreprise"><br>
        <input type="text" name="poste" placeholder="Poste"><br>
        <input type="date" name="date_debut" placeholder="Date de début"><br>
        <input type="date" name="date_fin" placeholder="Date de fin"><br>
        <textarea name="description" placeholder="Description"></textarea><br>
        <input type="text" name="nom_formation" placeholder="Nom de la formation"><br>
        <input type="text" name="diplome" placeholder="Diplôme"><br>
        <input type="date" name="annee_debut" placeholder="Année de début"><br>
        <input type="date" name="annee_fin" placeholder="Année de fin"><br>
        <input type="text" name="domaine_etude" placeholder="Domaine d'étude"><br>

        <input type="submit" value="ajouter" >
        
        
    </form>
</body>
</html>


