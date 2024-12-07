<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenue à votre espace</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      padding: 0;
      background: #f7f9fc;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #333;
    }
    .container {
      display: flex;
      flex-direction: row;
      width: 100%;
      max-width: 1200px;
      background: #ffffff;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }
    .welcome-section {
      flex: 1;
      position: relative;
      background: url('assets/img/hh.jpg') center center/cover no-repeat;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 50px;
      color: #ffffff;
    }
    .welcome-section::after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      z-index: 1;
    }
    .welcome-section h1,
    .welcome-section p {
      position: relative;
      z-index: 2;
    }
    .welcome-section h1 {
      font-size: 2.5rem;
      margin-bottom: 20px;
      font-weight: bold;
      text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.8);
    }
    .welcome-section p {
      font-size: 1.2rem;
      margin-bottom: 20px;
      line-height: 1.5;
      text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.8);
    }
    .form-section {
      flex: 1;
      padding: 50px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }
    .form-section .user-icon {
      font-size: 4rem;
      color: #2563eb;
      margin-bottom: 20px;
    }
    .form-section h2 {
      font-size: 1.8rem;
      margin-bottom: 20px;
      color: #2563eb;
    }
    .form-outline input {
      background: #f7f9fc;
      border: 1px solid #d1d5db;
      padding: 10px;
      border-radius: 8px;
      margin-bottom: 20px;
      width: 100%;
      font-size: 1rem;
    }
    .form-outline input:focus {
      outline: none;
      border-color: #2563eb;
    }
    .form-section button {
      width: 100%;
      padding: 10px;
      background: #2563eb;
      color: #fff;
      border: none;
      border-radius: 8px;
      font-size: 1.2rem;
      font-weight: bold;
      cursor: pointer;
      transition: background 0.3s ease;
    }
    .form-section button:hover {
      background: #1d4ed8;
    }
  </style>
</head>
<body>
<div class="container">
  <div class="welcome-section">
    <h1>Bienvenue à votre espace</h1>
    <p>Connectez-vous pour explorer et gérer vos services personnalisés.</p>
    <p>"Nous sommes ravis de vous compter parmi nous."</p>
  </div>
  <div class="form-section">
    <i class="bi bi-person-circle user-icon"></i>
    <h2>Connexion</h2>

    <!-- Affichage des erreurs de validation -->
    <?php if (isset($errors) && !empty($errors)): ?>
      <div class="alert alert-danger">
        <ul>
          <?php foreach ($errors as $error): ?>
            <li><?= esc($error) ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <form action="<?= base_url('/login_client') ?>" method="POST">
      <div class="form-outline">
        <label for="form1Example13">Email</label>
        <input type="email" id="form1Example13" name="email" placeholder="Entrez votre email" required value="<?= isset($data['email']) ? esc($data['email']) : '' ?>">
      </div>
      <div class="form-outline">
        <label for="form1Example23">Mot de passe</label>
        <input type="password" id="form1Example23" name="password" placeholder="Entrez votre mot de passe" required>
      </div>
      <button type="submit">Se connecter</button>
    </form>
  </div>
</div>

</body>
</html>
