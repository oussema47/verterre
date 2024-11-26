<?php
require_once('connection.php');

$response = ["status" => "error", "message" => ""];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM admins WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {
        if (password_verify($password, $row['mot_de_passe'])) {
            session_start();
            $_SESSION['user_id'] = $row['id_admin'];
            $response["status"] = "success";
        } else {
            $response["message"] = "Mot de passe incorrect.";
        }
    } else {
        $response["message"] = "Aucun admin trouvé avec cet email.";
    }

    mysqli_stmt_close($stmt);
    echo json_encode($response);
    exit();
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e4fecf;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            width: 720px;
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
        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .error-message {
            color: red;
            font-size: 0.9em;
            margin-bottom: 15px;
            display: none;
        }
        .button-container {
            display: flex;
            justify-content: center;
        }
        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .forgot-password {
            text-align: left;
            margin-top: 10px;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>admin</h2>
        <form id="loginForm">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
            <div class="error-message" id="emailError"></div>

            <label for="password">Mot de passe</label>
            <input type="password" id="password" name="password" required>
            <div class="error-message" id="passwordError"></div>

            <div class="forgot-password">
                <a href="forgot_password.php">Mot de passe oublié ?</a>
            </div>

            <div class="button-container">
            <a href="dashboard.php"><button type="submit">Se connecter</button></a>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $('#loginForm').on('submit', function(e) {
                e.preventDefault();

                $('#emailError').hide();
                $('#passwordError').hide();

                $.ajax({
                    type: 'POST',
                    url: '',
                    data: {
                        email: $('#email').val(),
                        password: $('#password').val()
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            window.location.href = 'dashboard.php';  
                        } else {
                            if (response.message.includes("email")) {
                                $('#emailError').text(response.message).show();
                            } else if (response.message.includes("Mot de passe")) {
                                $('#passwordError').text(response.message).show();
                            }
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>
