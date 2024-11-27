<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Rendez-vous</title>
    <link rel="stylesheet" href="path_to_your_styles.css">
    <style>
        /* Styles de base */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        .btn {
            padding: 8px 16px;
            margin: 5px;
            text-decoration: none;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn-danger {
            background-color: #dc3545;
        }
        .btn-warning {
            background-color: #ffc107;
        }
        .btn-success {
            background-color: #28a745;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Liste de vos Rendez-vous</h1>

        <table>
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Heure</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rendezvous as $rendezvousItem): ?>
                    <tr>
                        <td><?= esc($rendezvousItem['date_rendez_vous']) ?></td>
                        <td><?= esc($rendezvousItem['heure_rendez_vous']) ?></td>
                        <td><?= esc($rendezvousItem['statut']) ?></td>
                        <td>
                            <?php if ($rendezvousItem['statut'] == 'en attente'): ?>
                                <a href="/rendezvous/delete/<?= $rendezvousItem['id'] ?>" class="btn btn-danger">Supprimer</a>
                            <?php elseif ($rendezvousItem['statut'] == 'validé'): ?>
                                <!-- Lien de téléchargement du PDF -->
                                <a href="<?= base_url('pdfs/rendezvous_' . $rendezvousItem['id'] . '.pdf') ?>" class="btn btn-success" target="_blank">Télécharger le PDF</a>

                            <?php else: ?>
                                <!-- Pas d'action si le statut n'est ni 'en attente' ni 'validé' -->
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
