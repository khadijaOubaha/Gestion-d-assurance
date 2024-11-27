<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: Arial, sans-serif;
        }
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: scale(1.05);
        }
        .card i {
            font-size: 2rem;
            margin-bottom: 15px;
        }
        .card p {
            font-size: 1.1rem;
            color: #6c757d;
        }
        table {
            margin-top: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            overflow: hidden;
        }
        th, td {
            text-align: center;
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <div class="container mt-3">
        <div class="row text-center">
            <div class="col-md-3">
                <div class="card p-4">
                    <i class="fas fa-user text-primary"></i>
                    <h5><?= $data['totalClients']; ?></h5>
                    <p>Clients</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-4">
                    <i class="fas fa-clock text-warning"></i>
                    <h5>123.50</h5>
                    <p>Average Time</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-4">
                    <i class="fas fa-cloud text-info"></i>
                    <h5>1805</h5>
                    <p>Collections</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card p-4">
                    <i class="fas fa-comments text-success"></i>
                    <h5><?= count($data['feedbacks']); ?></h5> <!-- Affichage du nombre total de feedbacks -->
                    <p>Commentaires</p>
                </div>
            </div>
        </div>

        <!-- User Table -->
        <h3 class="text-center mt-5">Liste des Feedbacks</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Message</th>
                    <th>Note</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($data['feedbacks'])): ?>
                    <?php foreach ($data['feedbacks'] as $feedback): ?>
                        <tr>
                            <td><?= $feedback['message']; ?></td>
                            <td><?= $feedback['rating']; ?> / 5</td>
                            <td><?= $feedback['created_at']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="text-center">Aucun feedback trouvé.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
