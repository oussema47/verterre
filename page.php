<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
    }

    .card {
      width: 380px;
      height: 600px;
      border-radius: 50px;
      background: #e0e0e0;
      box-shadow: 10px 10px 50px #bebebe, -10px -10px 50px #ffffff;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: space-evenly;
      padding: 10px;
      box-sizing: border-box;
    }

    .logo {
      font-size: 24px;
      font-weight: bold;
      color: #333;
    }

    .button {
      width: 80%;
      padding: 20px;
      font-size: 14px;
      color: #fff;
      text-align: center;
      display: inline-block;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
      outline: none;
      text-decoration: none;
    }

    .button.connect {
      background-color: #39923ca5;
    }

    .button.create {
      background-color: #39923ca5;
    }

    .button:not(:last-child) {
      margin-bottom: 10px;
    }
  </style>
</head>
<body>

<div class="card">
  
  <div class="logo">Logo</div>

  <a href="utilisateur/formulaire.php" class="button create">Créer un compte</a> 
  <a href="utilisateur/login.php" class="button create">Se connecter</a> 
</div>

</body>
</html>
