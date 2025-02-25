<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil du Client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f9fafc;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1000px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 2.5rem;
            font-weight: bold;
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        h2 {
            font-size: 1.8rem;
            font-weight: 600;
            color: #4a4a4a;
            margin-bottom: 15px;
            border-left: 4px solid #007bff;
            padding-left: 10px;
        }

        p {
            font-size: 1rem;
            line-height: 1.8;
            color: #555;
            margin: 5px 0;
        }

        strong {
            color: #007bff;
        }

        .btn {
            display: inline-block;
            padding: 12px 25px;
            font-size: 1.1rem;
            font-weight: bold;
            text-align: center;
            color: white;
            background-color: #007bff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 20px;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .info-box {
            background-color: #f8f9fc;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .info-box p {
            margin-bottom: 8px;
        }

        @media (max-width: 768px) {
            h1 {
                font-size: 2rem;
            }

            h2 {
                font-size: 1.5rem;
            }

            .btn {
                font-size: 1rem;
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenue, <?= esc($user['prenom']); ?> <?= esc($user['nom']); ?></h1>

        <div class="info-box">
            <h2>Informations personnelles</h2>
            <p><strong>Email:</strong> <?= esc($user['email']); ?></p>
            <p><strong>Téléphone:</strong> <?= esc($user['telephone']); ?></p>
            <p><strong>Adresse:</strong> <?= esc($user['adresse']); ?></p>
            <p><strong>Ville:</strong> <?= esc($user['ville']); ?></p>
            <p><strong>Date de naissance:</strong> <?= esc($user['date_naissance']); ?></p>
            <p><strong>Date d'obtention du permis:</strong> <?= esc($user['date_obtention_permis']); ?></p>
        </div>

        
        <?php if ($vehicle): ?>
        <div class="info-box">
            <h2>Informations du véhicule</h2>
            <p><strong>Marque:</strong> <?= esc($vehicle['marque']); ?></p>
            <p><strong>Modèle:</strong> <?= esc($vehicle['modele']); ?></p>
            <p><strong>Année de fabrication:</strong> <?= esc($vehicle['annee_fabrication']); ?></p>
            <p><strong>Numéro d'immatriculation:</strong> <?= esc($vehicle['immatriculation']); ?></p>
            <p><strong>Carburant:</strong> <?= esc($vehicle['carburant']); ?></p>
            <p><strong>Puissance fiscale:</strong> <?= esc($vehicle['puissance_fiscale']); ?></p>
        </div>
        <?php else: ?>
        <p class="text-center">Aucun véhicule associé à votre profil.</p>
        <?php endif; ?>

       
    </div>
</body>
</html>
