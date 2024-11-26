<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Utilisateur - Verterre</title>
    <style>
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f8f8;
        }

        .container {
            display: flex;
            width: 80%;
            max-width: 1000px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .sidebar {
            width: 25%;
            background-color: #4CAF50;
            padding: 20px;
            border-radius: 8px 0 0 8px;
        }

        .sidebar h2 {
            color: #fff;
            margin-bottom: 20px;
            font-size: 20px;
        }

        .sidebar ul {
            list-style: none;
        }

        .sidebar ul li {
            margin-bottom: 15px;
            padding: 10px;
            color: #fff;
            cursor: pointer;
            border-radius: 4px;
        }

        .sidebar ul li:hover,
        .sidebar ul li.active {
            background-color: #85d888;
        }

        .content {
            width: 75%;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .profile-card {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 20px;
            background-color: #f3f3f3;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .profile-pic {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            object-fit: cover;
        }

        .profile-info {
            color: #333;
        }

        .profile-info h3 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .profile-info p {
            margin-bottom: 5px;
            color: #666;
        }
    </style>
</head>
<body>
    <?php
    
    $servername = "localhost"; 
    $username = "root"; 
    $password = ""; 
    $dbname = "verterre"; 

    
    $conn = new mysqli($servername, $username, $password, $dbname);

    
    if ($conn->connect_error) {
        die("Connexion échouée: " . $conn->connect_error);
    }

    
    $user_id = 1; 
    
    $sql = "SELECT nom, prenom, email, num_tel, photo FROM utilisateur WHERE id_utilisateur = $user_id";
    $result = $conn->query($sql);

   
    if ($result->num_rows > 0) {
        
        $row = $result->fetch_assoc();
    } else {
        echo "Utilisateur non trouvé.";
    }

    
    $conn->close();
    ?>
    <div class="container">
        <aside class="sidebar">
            <h2>Mon Compte</h2>
            <ul>
                <li class="active">Mon Compte</li>
                <li>Gérer le Profil</li>
                <li>Mes Commandes</li>
                <li>Contact</li>
                <li>Se Déconnecter</li>
            </ul>
        </aside>

        <main class="content">
            <div class="profile-card">
                <img src="<?php echo $row['photo']; ?>" alt="Photo de profil" class="profile-pic">
                <div class="profile-info">
                    <h3><?php echo $row['nom'] . ' ' . $row['prenom']; ?></h3>
                    <p>Email: <?php echo $row['email']; ?></p>
                    <p>Téléphone: <?php echo $row['num_tel']; ?></p>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
