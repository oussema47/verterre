<?php
require_once('connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate form inputs
    $prenom = mysqli_real_escape_string($conn, htmlspecialchars($_POST['first-name']));
    $nom = mysqli_real_escape_string($conn, htmlspecialchars($_POST['last-name']));
    $email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email']));
    $mot_de_passe = mysqli_real_escape_string($conn, htmlspecialchars($_POST['password']));
    $confirm_password = mysqli_real_escape_string($conn, htmlspecialchars($_POST['confirm-password']));
    
    // Server-side validation
    $errors = [];
    if (empty($prenom)) {
        $errors[] = "Veuillez entrer votre prénom.";
    }
    if (empty($nom)) {
        $errors[] = "Veuillez entrer votre nom.";
    }
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Veuillez entrer une adresse e-mail valide.";
    }
    if (empty($mot_de_passe) || strlen($mot_de_passe) < 6) {
        $errors[] = "Veuillez fournir un mot de passe d'au moins 6 caractères.";
    }
    if ($mot_de_passe !== $confirm_password) {
        $errors[] = "Les mots de passe ne correspondent pas.";
    }

    if (empty($errors)) {
       
        $hashed_password = password_hash($mot_de_passe, PASSWORD_DEFAULT);

       
        $sql = "INSERT INTO admins (prenom, nom, email, mot_de_passe) VALUES ('$prenom', '$nom', '$email', '$hashed_password')";
        
        if (mysqli_query($conn, $sql)) {
          echo "Inscription réussie !";
        } else {
            echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
}
?>

<!DOCTYPE html>  
<html lang="fr"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
    <style> 
        body {
            font-family: Arial, sans-serif;
            background-color: #e4fecf;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 1200px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #4CAF50;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input, select {
            width: 95%;
            padding: 10px;
            margin-bottom: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .gender {
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }

        .gender label {
            margin-right: 500px;
            font-weight: normal;
        }

        .error-message {
            color: red;
            font-size: 0.9em;
            margin-bottom: 15px;
            display: none;
        }

        .buttons {
            text-align: center;
        }

        .buttons button {
            padding: 15px 30px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            margin: 10px;
        }

        .buttons button:hover {
            background-color: #45a049;
        }

        .secondary-button {
            background-color: #ddd;
            color: #333;
        }

        .secondary-button:hover {
            background-color: #ccc;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.error-message').hide();

            $('form').on('submit', function(event) {
                let isValid = true;

          
                $('.error-message').hide();

     
                $('input').each(function() {
                    if ($(this).val().trim() === '') {
                        $(this).next('.error-message').show();
                        isValid = false;
                    }
                });

                const email = $('#email').val();
                if (!email.includes('@')) {
                    $('#emailError').show();
                    isValid = false;
                }

                const password = $('#password').val();
                if (password.length < 6) {
                    $('#passwordError').show();
                    isValid = false;
                }

                const confirmPassword = $('#confirm-password').val();
                if (confirmPassword !== password) {
                    $('#confirmPasswordError').show();
                    isValid = false;
                }

                const firstName = $('#first-name').val();
                if (firstName.trim() === '') {
                    $('#firstNameError').show();
                    isValid = false;
                }

                const lastName = $('#last-name').val();
                if (lastName.trim() === '') {
                    $('#lastNameError').show();
                    isValid = false;
                }

                if (!isValid) {
                    event.preventDefault();
                }
            });
        });
    </script>
</head>
<body>
    <div class="container">
        <h2>Administration</h2>
        <form action="" method="POST">
            <label for="first-name">Prénom</label>
            <input type="text" id="first-name" name="first-name" value="<?php echo isset($prenom) ? $prenom : ''; ?>">
            <div class="error-message" id="firstNameError">Veuillez entrer votre prénom</div>

            <label for="last-name">Nom</label>
            <input type="text" id="last-name" name="last-name" value="<?php echo isset($nom) ? $nom : ''; ?>">
            <div class="error-message" id="lastNameError">Veuillez entrer votre nom</div>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>">
            <div class="error-message" id="emailError">Veuillez entrer une adresse e-mail valide</div>

            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password">
            <div class="error-message" id="passwordError">Veuillez fournir un mot de passe d'au moins 6 caractères</div>

            <label for="confirm-password">Vérifier le mot de passe</label>
            <input type="password" id="confirm-password" name="confirm-password">
            <div class="error-message" id="confirmPasswordError">Veuillez écrire le même mot de passe</div>

            <div class="buttons">
                <a href="dashboard.php"><button type="submit">Rejoindre</button></a>
            </div>
        </form>
    </div>
</body>
</html>
