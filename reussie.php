<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inscription réussie! </title>
  <style>
    
    body {
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
      background-color: #85d888;
    }

    
    .card {
      --bg: #e8e8e8;
      --contrast: #e2e0e0;
      --grey: #a5baba;
      position: relative;
      padding: 9px;
      background-color: var(--bg);
      border-radius: 35px;
      box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px, rgba(10, 37, 64, 0.35) 0px -2px 6px 0px inset;
    }

    .card-overlay {
      position: absolute;
      inset: 0;
      pointer-events: none;
      background: repeating-conic-gradient(var(--bg) 0.0000001%, var(--grey) 0.000104%) 60% 60%/600% 600%;
      filter: opacity(10%) contrast(105%);
    }

    .card-inner {
      display: flex;
      justify-content: center;
      align-items: center;
      width: 210px;
      height: 274px;
      background-color: var(--contrast);
      border-radius: 30px;
      font-size: 30px;
      font-weight: 900;
      color: #2a672d;
      text-align: center;
      font-family: monospace;
    }
  </style>
</head>
<body>
  <div class="card">
    <div class="card-overlay"></div>
    <div class="card-inner">Inscription réussie!</div>
  </div>
</body>
</html>
