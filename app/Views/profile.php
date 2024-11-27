<!DOCTYPE html>  
<html lang="fr">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Profil du Client</title>  
    <link rel="stylesheet" href="path_to_your_styles.css"> <!-- Lien vers votre fichier CSS -->  
    <style>  
        /* Global Styles */  
        body {  
            font-family: 'Arial', sans-serif;  
            background-color: #f3f4f6;  
            margin: 0;  
            padding: 0;  
            color: #333;  
        }  

        h1, h2 {  
            color: black;  
            text-align: center;  
            margin-bottom: 10px;  
        }  

        .container {  
            max-width: 1200px;  
            margin: 50px auto;  
            padding: 30px;  
            background-color: #fff;  
            border-radius: 10px;  
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);  
            position: relative;  
            transition: transform 0.3s ease;  
        }  

        .container:hover {  
            transform: scale(1.01);  
        }  

        .profile-info, .vehicle-info {  
            margin-bottom: 30px;  
            padding: 20px;  
            border-radius: 8px;  
            background-color: #f8f9fa;  
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);  
        }  

        .profile-info p, .vehicle-info p {  
            font-size: 16px;  
            line-height: 1.6;  
            color: #555;  
            margin: 5px 0; /* Espace entre chaque attribut */  
        }  

        strong {  
            color: #007bff;  
        }  

        .btn {  
            display: inline-block;  
            padding: 12px 25px;  
            margin-top: 20px;  
            background-color: #007bff;  
            color: white;  
            text-decoration: none;  
            border-radius: 5px;  
            font-size: 18px;  
            font-weight: bold;  
            transition: background-color 0.3s ease, transform 0.2s ease;  
            text-align: center;  
        }  

        .btn:hover {  
            background-color: #0056b3;  
            transform: scale(1.05);  
        }  

        @media (max-width: 768px) {  
            .container {  
                margin: 20px; /* Réduire les marges sur petits écrans */  
                padding: 15px; /* Réduire le padding sur petits écrans */  
            }  
            
            .btn {  
                width: 100%; /* Bouton plein largeur sur petits écrans */  
            }  
        }  
    </style>  
</head>  
<body>  
    <div class="container">  
        <h1>Bienvenue, <?= esc($user['prenom']); ?> <?= esc($user['nom']); ?></h1>  

        <!-- Affichage des informations du client -->  
        <div class="profile-info">  
            <h2>Informations personnelles</h2>  
            <p><strong>Email:</strong> <?= esc($user['email']); ?></p>  
            <p><strong>Téléphone:</strong> <?= esc($user['telephone']); ?></p>  
            <p><strong>Adresse:</strong> <?= esc($user['adresse']); ?></p>  
            <p><strong>Ville:</strong> <?= esc($user['ville']); ?></p>  
            <p><strong>Date de naissance:</strong> <?= esc($user['date_naissance']); ?></p>  
            <p><strong>Date d'obtention du permis:</strong> <?= esc($user['date_obtention_permis']); ?></p>  
        </div>  

        <!-- Affichage des informations du véhicule -->  
        <?php if ($vehicle): ?>  
        <div class="vehicle-info">  
            <h2>Informations du véhicule</h2>  
            <p><strong>Marque:</strong> <?= esc($vehicle['marque']); ?></p>  
            <p><strong>Modèle:</strong> <?= esc($vehicle['modele']); ?></p>  
            <p><strong>Année de fabrication:</strong> <?= esc($vehicle['annee_fabrication']); ?></p>  
            <p><strong>Numéro d'immatriculation:</strong> <?= esc($vehicle['immatriculation']); ?></p>  
            <p><strong>Carburant:</strong> <?= esc($vehicle['carburant']); ?></p>  
            <p><strong>Puissance fiscale:</strong> <?= esc($vehicle['puissance_fiscale']); ?></p>  
        </div>  
        <?php else: ?>  
            <p>Aucun véhicule associé à votre profil.</p>  
        <?php endif; ?>  
        
        <a href="<?= base_url('modifier/profil') ?>"class="btn">Modifier mon profil</a>  
    </div>  
</body>  
</html>