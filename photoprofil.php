<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navigation Bar</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 10vh;
    }

    .navbar {
      width: 100%;
      max-width: 1600px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 30px;
      background-color: transparent;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
      position: relative;
    }

    .navbar .nav-links {
      display: flex;
      gap: 15px;
      position: relative;
    }

    .navbar .nav-links a {
      text-decoration: none;
      color: #000000;
      font-size: 14px;
      transition: all 0.3s;
    }

    .navbar .nav-links a:active {
      color: #666;
      box-shadow: inset 4px 4px 12px #c5c5c5, inset -4px -4px 12px #ffffff;
    }

    .navbar .nav-links .dropdown {
      position: relative;
    }

    .navbar .nav-links .dropdown-content {
      display: none;
      position: absolute;
      top: 100%;
      left: 0;
      background-color: #f5f5f5;
      padding: 10px 0;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
      z-index: 1;
    }

    .navbar .nav-links .dropdown:hover .dropdown-content {
      display: block;
    }

    .navbar .dropdown-content a {
      display: block;
      padding: 10px 20px;
      background-color: #f5f5f5;
      color: #000;
      text-decoration: none;
      transition: background-color 0.3s;
    }

    .navbar .dropdown-content a:hover {
      background-color: #ddd;
    }

    .navbar .logo {
      font-size: 24px;
      font-weight: bold;
      text-align: center;
      flex: 1;
      display: flex;
      justify-content: center;
    }

    .navbar .icons {
      display: flex;
      gap: 15px;
      align-items: center;
    }

    .navbar .icons i {
      font-size: 18px;
      color: #333;
      cursor: pointer;
      transition: all 0.3s;
    }

    .navbar .icons i:active {
      color: #666;
      box-shadow: inset 4px 4px 12px #c5c5c5, inset -4px -4px 12px #ffffff;
    }

    .sign-up-btn {
      color: #090909;
      font-size: 18px;
      background: transparent;
      border: none;
      cursor: pointer;
    }

    .profile-dropdown {
      display: none;
      position: absolute;
      right: 0;
      top: 40px;
      background-color: #f5f5f5;
      box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
      border-radius: 6px;
      padding: 10px 0;
      min-width: 150px;
    }

    .profile-dropdown a {
      display: block;
      padding: 10px 20px;
      color: #000;
      text-decoration: none;
      transition: background-color 0.3s;
    }

    .profile-dropdown a:hover {
      background-color: #ddd;
    }

    .search-bar {
      display: none; 
      position: absolute;
      top: 100%;
      right: -1050px; 
      height: 75px;
      padding: 15px;
      width: 0; 
      transition: width 0.3s ease-in-out, right 0.3s ease-in-out;
      border-radius: 12px;
      border: 1.5px solid lightgrey;
      outline: none;
      box-shadow: 0px 0px 20px -18px rgba(0, 0, 0, 0.1);
    }

    .search-bar.active {
      display: flex; 
      width: 1500px; 
      right: 10px; 
    }
  </style>
</head>
<body>

<div class="navbar">
  <div class="nav-links">
    <a href="#">À propos de nous</a>
    <div class="dropdown">
      <a href="#">Plantes</a>
      <div class="dropdown-content">
        <a href="#">Fleurs</a>
        <a href="#">Succulentes</a>
        <a href="#">Plantes vertes</a>
        <a href="#">Herbes aromatiques</a>
      </div>
    </div>
    <a href="#">Blog</a>
    <a href="#">Événements</a>
  </div>

  <div class="logo">Logo</div>

  <div class="icons">
    <i class="fas fa-search" onclick="toggleSearchBar()"></i> 
    <i class="fas fa-shopping-cart"></i>
    
    <button class="sign-up-btn" onclick="toggleProfileMenu()">
      <i class="fas fa-user-circle"></i> 

   
    <div class="profile-dropdown" id="profile-dropdown">
      <a href="#">Mon compte</a>
      <a href="#">Se déconnecter</a>
    </div>
  </div>

  <div class="search-bar" id="search-bar">
    <input type="text" placeholder="Rechercher...">
  </div>
</div>

<script>
  function toggleSearchBar() {
    const searchBar = document.getElementById('search-bar');
    searchBar.classList.toggle('active');
    
    const profileDropdown = document.getElementById('profile-dropdown');
    profileDropdown.style.display = 'none';
  }

  function toggleProfileMenu() {
    const profileDropdown = document.getElementById('profile-dropdown');
    profileDropdown.style.display = profileDropdown.style.display === 'block' ? 'none' : 'block';
    
    const searchBar = document.getElementById('search-bar');
    searchBar.classList.remove('active');
  }
</script>

</body>
</html>
