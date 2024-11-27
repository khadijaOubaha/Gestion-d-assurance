<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prendre un Rendez-vous</title>
</head>
<body>
    <h1>Prendre un Rendez-vous</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <p style="color: green;"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>

    <form action="/rendezvous/store" method="post">
        <?= csrf_field() ?>

        <p><strong>Nom :</strong> <?= $client['nom'] ?></p>
        <p><strong>Prénom :</strong> <?= $client['prenom'] ?></p>
        <p><strong>Email :</strong> <?= $client['email'] ?></p>

        <label for="id_voiture">Voiture :</label>
        <select name="id_voiture" id="id_voiture" required>
            <option value="">-- Sélectionner une voiture --</option>
            <?php foreach ($voitures as $voiture): ?>
                <option value="<?= $voiture['id'] ?>"><?= $voiture['marque'] . ' ' . $voiture['modele'] ?></option>
            <?php endforeach; ?>
        </select>

        <br><br>

        <label for="date_rendez_vous">Date :</label>
        <input type="date" name="date_rendez_vous" id="date_rendez_vous" required>

        <br><br>

        <button type="submit">Valider</button>
    </form>
</body>
</html>
