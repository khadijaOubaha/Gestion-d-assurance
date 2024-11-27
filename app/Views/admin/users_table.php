<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau des Utilisateurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Tableau des Utilisateurs</h2>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
    <?php if (!empty($clients)): ?>
        <?php foreach ($clients as $client): ?>
            <tr>
                <td><?= htmlspecialchars($client['id'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($client['nom'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($client['prenom'], ENT_QUOTES, 'UTF-8') ?></td>
                <td><?= htmlspecialchars($client['email'], ENT_QUOTES, 'UTF-8') ?></td>
                <td>
                    <!-- Buttons -->
                    <a href="<?= base_url('/admin/deleteUser/' . $client['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                    <a href="<?= base_url('/admin/warnUser/' . $client['id']) ?>" class="btn btn-info btn-sm">Warn</a>
                </td>
            </tr>
        <?php endforeach; ?>
    <?php else: ?>
        <tr>
            <td colspan="5" class="text-center">No clients found.</td>
        </tr>
    <?php endif; ?>
</tbody>



        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
