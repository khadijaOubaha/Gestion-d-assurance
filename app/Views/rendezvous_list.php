<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Rendez-vous</title>
    <link rel="stylesheet" href="path_to_your_styles.css">
    <style>
        
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            font-size: 2em;
            color: #007bff;
            margin-bottom: 20px;
        }

        /* Styles pour le tableau */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }

        table th, table td {
            padding: 15px;
            text-align: center;
        }

        table th {
            background-color: #007bff;
            color: white;
            text-transform: uppercase;
            font-weight: bold;
        }

        table tr {
            border-bottom: 1px solid #ddd;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        table td {
            color: #555;
        }

        /* Styles pour les boutons */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px;
            text-decoration: none;
            color: white;
            border-radius: 5px;
            font-size: 0.9em;
            transition: background-color 0.3s ease;
        }

        .btn-danger {
            background-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #b02a37;
        }

        .btn-warning {
            background-color: #ffc107;
            color: #212529;
        }

        .btn-warning:hover {
            background-color: #e0a800;
        }

        .btn-success {
            background-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            table, thead, tbody, th, td, tr {
                display: block;
            }

            table tr {
                margin-bottom: 10px;
            }

            table td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }

            table td::before {
                content: attr(data-label);
                position: absolute;
                left: 10px;
                font-weight: bold;
                text-transform: uppercase;
            }

            table th {
                display: none;
            }
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
                        <td data-label="Date"><?= esc($rendezvousItem['date_rendez_vous']) ?></td>
                        <td data-label="Heure"><?= esc($rendezvousItem['heure_rendez_vous']) ?></td>
                        <td data-label="Statut"><?= esc($rendezvousItem['statut']) ?></td>
                        <td data-label="Actions">
                            <?php if ($rendezvousItem['statut'] == 'en attente'): ?>
                                <a href="/rendezvous/delete/<?= $rendezvousItem['id'] ?>" class="btn btn-danger">Supprimer</a>
                            <?php elseif ($rendezvousItem['statut'] == 'validé'): ?>
                                <a href="<?= base_url('pdfs/rendezvous_' . $rendezvousItem['id'] . '.pdf') ?>" class="btn btn-success" target="_blank">Télécharger le PDF</a>
                                <a href="/rendezvous/delete/<?= $rendezvousItem['id'] ?>" class="btn btn-danger">Supprimer</a>
                            <?php else: ?>
                                
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
