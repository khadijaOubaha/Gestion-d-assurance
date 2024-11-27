<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
        }

        /* Navbar */
        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #eaeaea;
        }

        .navbar-brand {
            font-size: 20px;
            font-weight: bold;
            color: #333;
        }

        .navbar-brand:hover {
            color: #555;
        }

        .navbar .nav-link {
            color: #555;
            font-size: 16px;
        }

        .navbar .nav-link:hover {
            color: #007bff;
        }

        .profile-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            margin-left: 10px;
            border: 2px solid #007bff;
        }

        /* Sidebar */
        .sidebar {
            background-color: #f8f9fa;
            border-right: 1px solid #eaeaea;
            min-height: 100vh;
            padding-top: 20px;
            position: fixed;
            top: 0;
            left: 0;
            width: 230px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
        }

        .sidebar a {
            color: #555;
            text-decoration: none;
            padding: 15px 20px;
            display: block;
            font-size: 16px;
            transition: background 0.3s, color 0.3s;
        }

        .sidebar a:hover {
            background-color: #e9ecef;
            color: #007bff;
        }

        .sidebar a.active {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }

        .sidebar .dropdown-item {
            font-size: 14px;
            padding: 10px 30px;
            color: #555;
        }

        .sidebar .dropdown-item:hover {
            color: #007bff;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-250px);
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .sidebar-toggler {
                display: block;
                color: #fff;
                font-size: 24px;
                margin-right: 20px;
            }

            .content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <button class="navbar-toggler sidebar-toggler" type="button">
            <i class="fas fa-bars"></i>
        </button>
        <a class="navbar-brand" href="#">Pluto Dashboard</a>
        <ul class="navbar-nav ms-auto">
        <li class="nav-item">
    <a class="nav-link" href="<?= base_url('admin/notifications') ?>">
        <i class="fas fa-bell"></i>
        <?php if (isset($newCount) && $newCount > 0): ?>
            <span class="badge badge-danger"><?= $newCount ?></span>
        <?php endif; ?>
    </a>
</li>


           
            <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
        <span><?= session()->get('prenom') . ' ' . session()->get('nom'); ?></span>
    </a>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
        <li><a class="dropdown-item" href="<?= base_url('/admin/logout') ?>">Déconnecter</a></li>
    </ul>
</li>


        </ul>
    </div>
</nav>

<!-- Sidebar -->
<div class="sidebar">
    <a href="<?= base_url('/admin/dashboard?view=home') ?>" class="active">
        <i class="fas fa-tachometer-alt me-2"></i>Dashboard
    </a>
    <div class="dropdown">
        <a href="#usersMenu" class="dropdown-toggle" data-bs-toggle="collapse" aria-expanded="false">
            <i class="fas fa-users me-2"></i>Users
        </a>
        <div class="collapse" id="usersMenu">
            <a href="<?= base_url('/admin/dashboard?view=add_user') ?>" class="dropdown-item">Ajouter Utilisateur</a>
            <a href="<?= base_url('/admin/dashboard?view=users_table') ?>" class="dropdown-item">Tableau des Utilisateurs</a>
        </div>
    </div>
    <a href="<?= base_url('/admin/notifications') ?>"><i class="fas fa-calendar-alt me-2"></i>
    Les rendez_vous</a>
    <a href=""><i class="fas fa-cogs me-2"></i>Settings</a>
</div>


<!-- Content -->
<div class="content">
    <?php
    if ($view === 'add_user') {
        echo view('admin/add_user', $data);
    } elseif ($view === 'users_table') {
        echo view('admin/users_table', $data);
    } else {
        echo view('admin/default_content');
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const toggler = document.querySelector('.sidebar-toggler');
    const sidebar = document.querySelector('.sidebar');

    toggler.addEventListener('click', () => {
        sidebar.classList.toggle('active');
    });
</script>
</body>
</html>
