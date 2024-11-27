<!-- admin/notifications.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .notification-list {
            list-style-type: none;
            padding: 0;
        }
        .notification-list li {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .notification-list li p {
            margin: 5px 0;
        }
        .btn {
            padding: 10px 15px;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-primary {
            background-color: #007bff;
            color: #fff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .btn-success {
            background-color: #28a745;
            color: #fff;
        }
        .btn-success:hover {
            background-color: #218838;
        }
        .btn-danger {
            background-color: #dc3545;
            color: #fff;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        .btn-secondary {
            background-color: #6c757d;
            color: #fff;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Notifications</h1>

        <?php if (count($newRendezVous) > 0): ?>
            <ul class="notification-list">
                <?php foreach ($newRendezVous as $rdv): ?>
                    <li>
                        <p><strong>Client :</strong> <?= esc($rdv['client_nom']) . ' ' . esc($rdv['client_prenom']) ?></p>
                        <p><strong>Date :</strong> <?= esc($rdv['date_rendez_vous']) ?></p>
                        <p><strong>Heure :</strong> <?= esc($rdv['heure_rendez_vous']) ?></p>
                        <div>
                            <a href="<?= base_url('admin/rendezvous/valider/' . $rdv['id']) ?>" class="btn btn-success">Valider</a>
                            <a href="<?= base_url('admin/rendezvous/rejeter/' . $rdv['id']) ?>" class="btn btn-danger">Rejeter</a>
                            <a href="<?= base_url('admin/notifications/mark-seen/' . $rdv['id']) ?>" class="btn btn-primary">Marquer comme vu</a>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>

        <?php else: ?>
            <p>Aucune nouvelle notification.</p>
        <?php endif; ?>
    </div>
</body>
</html>
