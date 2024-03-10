<?php

require_once 'connexion.php';


$message = '';
$error = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    if (
        isset($_POST['nom']) && isset($_POST['adresse']) && isset($_POST['telephone']) &&
        isset($_POST['email']) && isset($_POST['competence']) && isset($_POST['entreprise']) &&
        isset($_POST['poste']) && isset($_POST['date_debut']) && isset($_POST['date_fin']) &&
        isset($_POST['description']) && isset($_POST['nom_formation']) && isset($_POST['diplome']) &&
        isset($_POST['annee_debut']) && isset($_POST['annee_fin']) && isset($_POST['domaine_etude'])
    ) {
       
        $stmt = $pdo->prepare("SELECT COUNT(*) AS count FROM informations_professionnelles 
                                WHERE nom = :nom AND adresse = :adresse AND telephone = :telephone");
        $stmt->execute([
            'nom' => $_POST['nom'],
            'adresse' => $_POST['adresse'],
            'telephone' => $_POST['telephone']
        ]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result['count'] == 0) {
            try {
               
                $stmt = $pdo->prepare("INSERT INTO informations_professionnelles 
                                        (nom, adresse, telephone, email, competence, entreprise, poste, date_debut, date_fin, description, nom_formation, diplome, annee_debut, annee_fin, domaine_etude) 
                                        VALUES (:nom, :adresse, :telephone, :email, :competence, :entreprise, :poste, :date_debut, :date_fin, :description, :nom_formation, :diplome, :annee_debut, :annee_fin, :domaine_etude)");

                
                $stmt->execute([
                    'nom' => $_POST['nom'],
                    'adresse' => $_POST['adresse'],
                    'telephone' => $_POST['telephone'],
                    'email' => $_POST['email'],
                    'competence' => $_POST['competence'],
                    'entreprise' => $_POST['entreprise'],
                    'poste' => $_POST['poste'],
                    'date_debut' => $_POST['date_debut'],
                    'date_fin' => $_POST['date_fin'],
                    'description' => $_POST['description'],
                    'nom_formation' => $_POST['nom_formation'],
                    'diplome' => $_POST['diplome'],
                    'annee_debut' => $_POST['annee_debut'],
                    'annee_fin' => $_POST['annee_fin'],
                    'domaine_etude' => $_POST['domaine_etude']
                ]);

                $message = "Nouvelle information ajoutée avec succès.";
            } catch(PDOException $e) {
                $error = "Erreur : " . $e->getMessage();
            }
        } else {
            $error = "Cette information existe déjà dans la base de données.";
        }
    } else {
        $error = "Tous les champs du formulaire sont obligatoires.";
    }
}






$stmt = $pdo->query("SELECT * FROM informations_professionnelles");
$etudiants = $stmt->fetchAll(PDO::FETCH_ASSOC);


if (!$etudiants) {
    echo "Aucun étudiant trouvé.";
    exit;
}

$dernierEtudiant = reset($etudiants); 


?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Générateur de CV</title>
    <style>
       
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .cv {
            margin-bottom: 30px;
        }

     
        h1, h2 {
            color: #000000;
            border-bottom: 1px solid #007bff;
            padding-bottom: 5px;
            margin-bottom: 20px;
        }

      
        p {
            margin-bottom: 15px;
        }

     
        a {
            display: inline-block;
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }

        a:hover {
            background-color: #0056b3;
        }

        
        strong {
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="cv">
            <h1>Curriculum Vitae</h1>
            <h2>Informations personnelles</h2>
            <p><strong>Nom :</strong> <?php echo $dernierEtudiant['nom']; ?></p>
            <p><strong>Adresse :</strong> <?php echo $dernierEtudiant['adresse']; ?></p>
            <p><strong>Téléphone :</strong> <?php echo $dernierEtudiant['telephone']; ?></p>
            <p><strong>Email :</strong> <?php echo $dernierEtudiant['email']; ?></p>
            <h2>Expérience professionnelle</h2>
            <p><strong>Entreprise :</strong> <?php echo $dernierEtudiant['entreprise']; ?></p>
            <p><strong>Poste :</strong> <?php echo $dernierEtudiant['poste']; ?></p>
            <p><strong>Date de début :</strong> <?php echo $dernierEtudiant['date_debut']; ?></p>
            <p><strong>Date de fin :</strong> <?php echo $dernierEtudiant['date_fin']; ?></p>
            <p><strong>Description :</strong> <?php echo $dernierEtudiant['description']; ?></p>
            <h2>Formation</h2>
            <p><strong>Nom de la formation :</strong> <?php echo $dernierEtudiant['nom_formation']; ?></p>
            <p><strong>Diplôme :</strong> <?php echo $dernierEtudiant['diplome']; ?></p>
            <p><strong>Année de début :</strong> <?php echo $dernierEtudiant['annee_debut']; ?></p>
            <p><strong>Année de fin :</strong> <?php echo $dernierEtudiant['annee_fin']; ?></p>
            <p><strong>Domaine d'étude :</strong> <?php echo $dernierEtudiant['domaine_etude']; ?></p>
        </div>
        <a href="genercvpdf.php">Télécharger CV en PDF</a>
    </div>
</body>
</html>
