<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion Administrateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/css/admin.css') ?>" rel="stylesheet">

    <style>
        
    </style>
</head>
<body>
    <div class="login-container">
        <i class="fas fa-user-circle user-icon"></i>
        <!-- <h2>Connexion Administrateur</h2> -->
        <!-- <p>Veuillez entrer vos identifiants pour accéder à votre tableau de bord.</p> -->

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('/admin/loginProcess') ?>" method="post">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="email" class="form-label">Email :</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Entrez votre email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe :</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Entrez votre mot de passe" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Connexion</button>
        </form>

       
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
