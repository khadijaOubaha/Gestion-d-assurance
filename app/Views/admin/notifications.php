<!-- admin/notifications.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css') ?>">
</head>
<body>
    <div class="container">
        <h1>Notifications</h1>

        <?php if (session()->getFlashdata('pdfFileName')): ?>
            <?php $pdfFileName = session()->getFlashdata('pdfFileName'); ?>
        <?php endif; ?>

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

                            <?php if (isset($pdfFileName)): ?>
                                <p><strong>PDF généré pour ce rendez-vous : </strong>
                                
                                <a href="<?= base_url('pdfs/rendezvous_' . $rendezvousItem['id'] . '.pdf') ?>" class="btn btn-success" target="_blank">Télécharger le PDF</a>

                                </p>
                            <?php endif; ?>
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
