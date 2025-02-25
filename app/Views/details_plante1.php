<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Plante 1</title>
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

        .plant-details {
            max-width: 600px;
            margin: 0 auto;
            text-align: center;
        }

        .sensor {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background-color: white;
            padding: 1rem;
            margin: 1rem 0;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .sensor img {
            width: 40px;
            height: 40px;
        }

        .sensor-value {
            font-size: 1.2rem;
            font-weight: bold;
            color: #4CAF50;
        }

        .back-link {
            display: inline-block;
            margin-top: 1rem;
            text-decoration: none;
            color: #fff;
            background-color: #4CAF50;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .back-link:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <header>
        <h1>Détails de la Plante 1</h1>
    </header>
    <main>
        <section class="plant-details">
            <h2>Capteurs et leurs valeurs</h2>
            <div class="sensor">
                
                <span>Température</span>
                <span class="sensor-value" id="temperature">--°C</span>
            </div>
            <div class="sensor">
     
                <span>Humidité</span>
                <span class="sensor-value" id="humidity">--%</span>
            </div>
            <div class="sensor">
               
                <span>Humidité du Sol</span>
                <span class="sensor-value" id="soil-moisture">--%</span>
            </div>
            <div class="sensor">
     
                <span>Lumière</span>
                <span class="sensor-value" id="light">-- lux</span>
            </div>
            <a href="index.html" class="back-link">Consulter l'eau utilisé</a>
        </section>
    </main>
    <script>
        // Génération aléatoire des valeurs des capteurs
        document.getElementById('temperature').textContent = (20 + Math.random() * 10).toFixed(1) + '°C';
        document.getElementById('humidity').textContent = (40 + Math.random() * 20).toFixed(1) + '%';
        document.getElementById('soil-moisture').textContent = (30 + Math.random() * 30).toFixed(1) + '%';
        document.getElementById('light').textContent = (300 + Math.random() * 200).toFixed(0) + ' lux';
    </script>
</body>
</html>
