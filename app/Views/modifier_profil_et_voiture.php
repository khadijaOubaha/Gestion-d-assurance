<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier le Profil et le Véhicule</title>
    <style>
        /* Généralités */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 50px;
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 2rem;
            margin-bottom: 20px;
        }

        h2 {
            color: #444;
            font-size: 1.5rem;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        label {
            font-size: 1rem;
            color: #555;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="email"],
        input[type="date"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="date"]:focus,
        input[type="number"]:focus {
            border-color: #5c6bc0;
            outline: none;
        }

        .btn {
            background-color: #5c6bc0;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 1.1rem;
            border-radius: 5px;
            cursor: pointer;
            display: block;
            width: 100%;
            margin-top: 20px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #3f51b5;
        }

        /* Espacement des champs */
        .form-group {
            margin-bottom: 15px;
        }

        /* Responsivité */
        @media screen and (max-width: 768px) {
            .container {
                width: 95%;
            }

            h1 {
                font-size: 1.5rem;
            }

            h2 {
                font-size: 1.3rem;
            }

            .btn {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Modifier votre Profil et Véhicule</h1>
        <form method="POST" action="<?= base_url('/profil/store') ?>">
            <!-- Informations client -->
            <h2>Informations personnelles</h2>
            <div class="form-group">
                <label for="nom">Nom:</label>
                <input type="text" name="nom" id="nom" value="<?= esc($user['nom']) ?>" required>
            </div>

            <div class="form-group">
                <label for="prenom">Prénom:</label>
                <input type="text" name="prenom" id="prenom" value="<?= esc($user['prenom']) ?>" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="<?= esc($user['email']) ?>" required>
            </div>

            <div class="form-group">
                <label for="telephone">Téléphone:</label>
                <input type="text" name="telephone" id="telephone" value="<?= esc($user['telephone']) ?>" required>
            </div>

            <div class="form-group">
                <label for="adresse">Adresse:</label>
                <input type="text" name="adresse" id="adresse" value="<?= esc($user['adresse']) ?>" required>
            </div>

            <div class="form-group">
                <label for="ville">Ville:</label>
                <input type="text" name="ville" id="ville" value="<?= esc($user['ville']) ?>" required>
            </div>

            <div class="form-group">
                <label for="date_naissance">Date de naissance:</label>
                <input type="date" name="date_naissance" id="date_naissance" value="<?= esc($user['date_naissance']) ?>" required>
            </div>

            <div class="form-group">
                <label for="date_obtention_permis">Date d'obtention du permis:</label>
                <input type="date" name="date_obtention_permis" id="date_obtention_permis" value="<?= esc($user['date_obtention_permis']) ?>" required>
            </div>

            <!-- Informations du Véhicule -->
            <h2>Informations du Véhicule</h2>
            <div class="form-group">
                <label for="marque">Marque:</label>
                <input type="text" name="marque" id="marque" value="<?= esc($vehicle['marque']) ?>" required>
            </div>

            <div class="form-group">
                <label for="modele">Modèle:</label>
                <input type="text" name="modele" id="modele" value="<?= esc($vehicle['modele']) ?>" required>
            </div>

            <div class="form-group">
                <label for="annee_fabrication">Année de fabrication:</label>
                <input type="number" name="annee_fabrication" id="annee_fabrication" value="<?= esc($vehicle['annee_fabrication']) ?>" required>
            </div>

            <div class="form-group">
                <label for="immatriculation">Numéro d'immatriculation:</label>
                <input type="text" name="immatriculation" id="immatriculation" value="<?= esc($vehicle['immatriculation']) ?>" required>
            </div>

            <div class="form-group">
                <label for="carburant">Carburant:</label>
                <input type="text" name="carburant" id="carburant" value="<?= esc($vehicle['carburant']) ?>" required>
            </div>

            <div class="form-group">
                <label for="puissance_fiscale">Puissance fiscale:</label>
                <input type="number" name="puissance_fiscale" id="puissance_fiscale" value="<?= esc($vehicle['puissance_fiscale']) ?>" required>
            </div>

            <button type="submit" class="btn">Mettre à jour</button>
        </form>
    </div>
</body>
</html>
