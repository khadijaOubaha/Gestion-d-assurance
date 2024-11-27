<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AMANASS Auto AminAss</title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #007bff;
            margin-top: 50px;
        }

        .product-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin: 50px 0;
            text-align: center;
        }

        .product-image {
            width: 300px;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .product-info {
            background-color: #fff;
            padding: 30px;
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 90%;
        }

        .product-info h2 {
            color: #007bff;
        }

        .product-info p {
            font-size: 16px;
            line-height: 1.6;
            color: #555;
        }

        .cta-button {
            display: inline-block;
            padding: 12px 25px;
            margin-top: 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        .cta-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <h1>AMANASS Auto AminAss</h1>

    <div class="product-container">
        <!-- Product Image -->
        <img src="<?= base_url('/assets/img/login_client.jpg') ?>" alt="AMANASS Auto" class="product-image">
        
        <!-- Product Info -->
        <div class="product-info">
            <h2>AMANASS Auto Complète</h2>
            <p>Chez **AmanAss**, nous offrons une couverture complète pour votre véhicule, avec des options flexibles pour s'adapter à vos besoins spécifiques. Profitez d'une tranquillité d'esprit totale, que vous soyez sur la route ou à la maison.</p>

            <p><strong>Ce que nous offrons :</strong></p>
            <ul>
                <li>Protection contre les accidents et dégâts matériels.</li>
                <li>AMANASS vol et incendie pour votre véhicule.</li>
                <li>Assistance routière 24/7.</li>
                <li>Options personnalisées pour chaque conducteur.</li>
            </ul>

            <p><strong>Pourquoi choisir AminAss ?</strong></p>
            <ul>
                <li>Service rapide et réactif.</li>
                <li>Prix compétitifs et transparents.</li>
                <li>Assistance et conseils personnalisés.</li>
            </ul>

            <a href="http://localhost:8080/#contact" class="cta-button">Souscrire maintenant</a>
        </div>
    </div>

</body>
</html>
