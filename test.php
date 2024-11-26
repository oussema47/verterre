<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nos Services Exceptionnels</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f9f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .services-section {
            text-align: center;
            padding: 20px;
            max-width: 1200px;
        }

        .services-section h2 {
            font-size: 36px;
            color: #333;
            margin-bottom: 10px;
        }

        .services-section h2 span {
            color: #4CAF50;
        }

        .intro-text {
            margin-bottom: 30px;
            color: #666;
            font-size: 16px;
        }

        .services-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 20px;
            flex-wrap: wrap;
        }

        .services-left, .services-right {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .service-box {
            width: 190px;
            height: 254px;
            border-radius: 30px;
            background: #e0e0e0;
            box-shadow: 15px 15px 30px #bebebe,
                        -15px -15px 30px #ffffff;
            text-align: center;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .service-box:hover {
            transform: translateY(-10px);
            box-shadow: 20px 20px 40px #b1b1b1,
                        -20px -20px 40px #ffffff;
        }

        .service-box .icon {
            width: 80px;
            height: 80px;
            background-color: #4CAF50;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 32px;
            color: #fff;
            margin-bottom: 10px;
        }

        .service-box h3 {
            font-size: 18px;
            color: #333;
            margin: 10px 0;
        }

        .service-box p {
            color: #777;
            font-size: 14px;
        }

        .services-center img {
            width: 500px;
            height: auto;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <section class="services-section">
        <h2>Nos <span>Services Exceptionnels</span></h2>
        <p class="intro-text">
            Lorem ipsum est simplement un texte factice de l'industrie de l'impression et de la composition. Lorem ipsum est le texte standard de l'industrie depuis les années 1500.
        </p>
        <div class="services-container">
            <div class="services-left">
                <div class="service-box">
                    <div class="icon">🌱</div>
                    <h3>Arrosage du Jardin</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div class="service-box">
                    <div class="icon">🌳</div>
                    <h3>Nettoyage des Arbres</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div class="service-box">
                    <div class="icon">🗑️</div>
                    <h3>Enlèvement des Déchets</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
            <div class="services-center">
                <img src="uploads/jardinier.png" alt="Jardinier tenant des plantes">
            </div>
            <div class="services-right">
                <div class="service-box">
                    <div class="icon">🌲</div>
                    <h3>Plantation d'Arbres</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div class="service-box">
                    <div class="icon">🌍</div>
                    <h3>Experts Certifiés</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
                <div class="service-box">
                    <div class="icon">📞</div>
                    <h3>Centre de Support 24/7</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
