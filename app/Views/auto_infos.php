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
            background-color: #f9fafb;
            color: #333;
        }

        h1 {
            text-align: center;
            font-size: 2.5em;
            color: #007bff;
            margin: 30px 0;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .product-container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin: 40px 20px;
            text-align: center;
        }

        .product-image {
            width: 350px;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-image:hover {
            transform: scale(1.05);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
        }

        .product-info {
            background-color: #fff;
            padding: 40px;
            margin-top: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            width: 95%;
            text-align: left;
        }

        .product-info h2 {
            color: #007bff;
            font-size: 1.8em;
            margin-bottom: 15px;
        }

        .product-info p {
            font-size: 1rem;
            line-height: 1.8;
            color: #555;
            margin-bottom: 20px;
        }

        .product-info ul {
            list-style: disc;
            margin: 20px 0;
            padding-left: 20px;
        }

        .product-info ul li {
            font-size: 1rem;
            line-height: 1.6;
            color: #333;
        }

        .cta-button {
            display: inline-block;
            padding: 15px 30px;
            margin-top: 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-size: 1.2em;
            font-weight: bold;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .cta-button:hover {
            background-color: #0056b3;
            transform: translateY(-3px);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .product-image {
                width: 100%;
                max-width: 300px;
            }

            .product-info {
                padding: 20px;
            }

            .product-info h2 {
                font-size: 1.5em;
            }

            .cta-button {
                font-size: 1rem;
                padding: 12px 20px;
            }
        }
    </style>
</head>
<body>

    <h1>AMANASS Auto AminAss</h1>

    <div class="product-container">
     
        <img src="<?= base_url('/assets/img/login_client.jpg') ?>" alt="AMANASS Auto" class="product-image">
      
        <div class="product-info">
            <h2>AMANASS Auto Complète</h2>
            <p>Chez <strong>AmanAss</strong>, nous offrons une couverture complète pour votre véhicule, avec des options flexibles pour s'adapter à vos besoins spécifiques. Profitez d'une tranquillité d'esprit totale, que vous soyez sur la route ou à la maison.</p>

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
