<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Plantes</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Style général */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        header {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 1rem 0;
        }

        h1 {
            margin: 0;
        }

        main {
            padding: 2rem;
        }

        /* Galerie des plantes */
        .plant-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            padding: 0;
            margin: 0;
        }

        figure {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            text-align: center;
            margin: 0;
        }

        figure img {
            width: 100%;
            height: auto;
            display: block;
        }

        figcaption {
            padding: 0.5rem;
            font-size: 1rem;
            font-weight: bold;
            color: #4CAF50;
        }
    </style>
</head>
<body>
    <header>
        <h1>Liste des Plantes</h1>
    </header>
    <main>
        <section class="plant-gallery">
            <figure>
                <!-- Lien cliquable sur l'image -->
                <a href="<?= base_url('/humidite') ?>">
                    <img src="<?= base_url('assets/img/1.jpeg') ?>" alt="Plante 1">
                </a>
                <figcaption>Plante 1</figcaption>
            </figure>
            <figure>
                <img src="<?= base_url('assets/img/2.jpeg') ?>" alt="Plante 2">
                <figcaption>Plante 2</figcaption>
            </figure>
            <figure>
                <img src="<?= base_url('assets/img/3.jpeg') ?>" alt="Plante 3">
                <figcaption>Plante 3</figcaption>
            </figure>
            <!-- Ajoutez d'autres figures si nécessaire -->
        </section>
    </main>
</body>
</html>
