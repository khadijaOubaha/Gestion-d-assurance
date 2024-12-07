<!-- admin/notifications.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }
        .container {
            max-width: 900px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .notification-list {
            list-style: none;
            padding: 0;
        }
        .notification-list li {
            background: #f7f7f7;
            padding: 15px;
            margin-bottom: 15px;
            border-left: 5px solid #007bff;
            border-radius: 5px;
        }
        .notification-list p {
            margin: 5px 0;
        }
        .btn {
            margin-right: 10px;
        }
        .btn-success, .btn-danger {
            font-size: 14px;
            padding: 5px 10px;
        }
        .pdf-link {
            font-size: 14px;
            color: #007bff;
            text-decoration: none;
        }
        .pdf-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    
<div class="container">
<h2>Rendez-vous</h2>
<?php if (session()->get('success')): ?>
    <div class="alert alert-success">
        <?= esc(session()->get('success')) ?>
    </div>
<?php endif; ?>
<p>Vous avez <?= esc($newRendezVousCount) ?> nouvelles notifications.</p>

<?php if ($newRendezVousCount > 0): ?>
    <ul class="notification-list">
        <?php foreach ($newRendezVous as $rdv): ?>
            <li>
                <p><strong>Client :</strong> <?= esc($rdv['client_nom']) . ' ' . esc($rdv['client_prenom']) ?></p>
                <p><strong>Téléphone :</strong> <?= esc($rdv['client_telephone']) ?></p>
                <p><strong>Adresse :</strong> <?= esc($rdv['client_adresse']) ?></p>
                <p><strong>Voiture :</strong> <?= esc($rdv['voiture_marque']) . ' - ' . esc($rdv['voiture_modele']) ?></p>
                <p><strong>Carburant :</strong> <?= esc($rdv['voiture_carburant']) ?></p>
                <p><strong>Immatriculation :</strong> <?= esc($rdv['voiture_immatriculation']) ?></p>
                <p><strong>Date du rendez-vous :</strong> <?= esc($rdv['date_rendez_vous']) ?></p>
                <p><strong>Heure :</strong> <?= esc($rdv['heure_rendez_vous']) ?></p>
                <a href="<?= base_url('admin/rendezvous/valider/' . $rdv['id']) ?>" class="btn btn-success">Valider</a>
                <a href="<?= base_url('admin/rendezvous/rejeter/' . $rdv['id']) ?>" class="btn btn-danger">Rejeter</a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

</div>

</body>
</html>
