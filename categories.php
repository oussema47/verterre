<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Galerie de Plantes</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: Helvetica, Verdana, sans-serif;
      min-height: 200vh;
    }

    nav {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  padding: 16px 20px 30px 20px;
  display: flex;
  align-items: center;
  transition: 0.3s ease-out;
  text-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
  color: white;
  font-size: 16px;
  z-index: 10;
  background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('uploads/bgpic.jpg');
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
}

    a {
      color: inherit;
      text-decoration: none;
    }

    .list {
      list-style-type: none;
      margin-left: auto;
      display: none;
    }

    @media (min-width: 640px) {
      .list {
        display: flex;
      }
    }

    .list li {
      margin-left: 20px;
      position: relative;
    }

    .search,
    .menu,
    .profile {
      background: none;
      border: none;
      margin-left: 20px;
      font-size: 20px;
      color: white;
      cursor: pointer;
    }

    .menu {
      display: inline-block;
    }

    @media (min-width: 640px) {
      .menu {
        display: none;
      }
    }

    .dropdown-menu {
      display: none;
      position: absolute;
      top: 100%;
      left: 0;
      background: rgba(0, 0, 0, 0.7);
      padding: 10px 0;
      width: 200px;
      box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
      border-radius: 5px;
      z-index: 20;
      transition: opacity 0.3s ease-out;
      opacity: 0;
    }

    .dropdown-menu li {
      padding: 8px 16px;
    }

    .dropdown-menu li a {
      color: white;
      display: block;
    }

    .list li:hover .dropdown-menu {
      display: block;
      opacity: 1;
    }

    .search-bar {
      display: none;
      position: fixed;
      top: 70px;
      left: 0;
      width: 100%;
      background: rgba(0, 0, 0, 0.8);
      padding: 10px;
      border-radius: 5px;
      transition: opacity 0.3s ease-out;
      z-index: 15;
    }

    .search-bar input {
      background: none;
      border: none;
      color: white;
      font-size: 18px;
      padding: 8px 16px;
      width: 100%;
      border-radius: 5px;
      outline: none;
    }

    .search-bar input::placeholder {
      color: #bbb;
    }

    .close-search {
      position: absolute;
      right: 8px;
      top: 8px;
      color: white;
      background: none;
      border: none;
      font-size: 18px;
      cursor: pointer;
    }

    header {
      text-align: center;
      background-color: #f4f4f4;
      padding: 20px 0;
      margin-top: 100px; 
    }
    

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
    }

    .categories {
      text-align: center;
      margin-bottom: 20px;
    }

    .categories a {
      margin: 0 10px;
      text-decoration: none;
      color: #333;
      font-weight: bold;
      transition: color 0.3s;
    }

    .categories a:hover {
      color: #ff6347;
    }

    .gallery {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 30px;
    }

    .card {
      position: relative;
      width: 300px;
      height: 320px;
      background-color: #f2f2f2;
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      perspective: 1000px;
      box-shadow: 0 0 0 5px #ffffff80;
      transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .card img {
      width: 100%;
      height: 100%;
      object-fit: center;
      object-position: center;
    }

    .card:hover {
      transform: scale(1.05);
      box-shadow: 0 8px 16px rgba(255, 255, 255, 0.2);
    }

    .card__content {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      padding: 20px;
      box-sizing: border-box;
      background-color: #f2f2f2;
      transform: rotateX(-90deg);
      transform-origin: bottom;
      transition: all 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    }

    .card:hover .card__content {
      transform: rotateX(0deg);
    }

    .card__title {
      margin: 0;
      font-size: 24px;
      color: #333;
      font-weight: 700;
    }

    .card__description {
      margin: 10px 0 0;
      font-size: 14px;
      color: #777;
      line-height: 1.4;
    }
    
  </style>
</head>

<body>

  <nav class="mask-pattern">
  <a href="barredemenu.php"><img src="uploads/logo verterre.png" alt="VerTerre Logo" style="height: 50px; display: block;"></a>
  <ul class="list">
      <li><a href="#">A propos de nous</a></li>
      <li>
        <a href="#">Plantes</a>
        <ul class="dropdown-menu">
          <li><a href="#">Fleurs</a></li>
          <li><a href="#">Succulentes</a></li>
          <li><a href="#">Plantes Vertes</a></li>
          <li><a href="#">Herbes Aromatiques</a></li>
        </ul>
      </li>
      <li><a href="#">Blog</a></li>
      <li><a href="#">Evenement</a></li>
    </ul>
    <button class="search" onclick="toggleSearch()"><i class="fa fa-search"></i></button>
    <button class="profile"><i class="fa fa-user"></i></button>
    <button class="menu">Menu</button>
  </nav>

  <div class="search-bar" id="search-bar">
    <input type="text" placeholder="Search...">
    <button class="close-search" onclick="toggleSearch()">&times;</button>
  </div>
  <div class="background-image"></div>
  <header>
    <h1>Galerie</h1>
  </header>

  <div class="container">
    <div class="categories">
      <a href="?category=fleurs">Fleurs</a>
      <a href="?category=succulentes">Succulentes</a>
      <a href="?category=plantes-vertes">Plantes Vertes</a>
      <a href="?category=herbes-aromatiques">Herbes Aromatiques</a>
    </div>
    <div class="gallery">
      <?php
      $plantes = [
        'fleurs' => ['1.jpg', '2.jpg', '3.jpg', '4.jpg', '5.jpg', '6.jpg', '7.jpg', '8.jpg', '9.jpg'],
        'succulentes' => ['11.jpg', '22.jpg', '33.jpg', '44.jpg', '55.jpg', '66.jpg', '77.jpg', '88.jpg', '99.jpg'],
        'plantes-vertes' => ['111.jpg', '222.jpg', '333.jpg', '444.jpg', '555.jpg', '666.jpg', '777.jpg', '888.jpg', '999.jpg'],
        'herbes-aromatiques' => ['1111.jpg', '2222.jpg', '3333.jpg', '4444.jpg', '5555.jpg', '6666.jpg', '7777.jpg', '8888.jpg', '9999.jpg']
      ];

      $category = isset($_GET['category']) ? $_GET['category'] : 'fleurs';

      if (array_key_exists($category, $plantes) && !empty($plantes[$category])) {
        foreach ($plantes[$category] as $image) {
          echo "
          <div class='card'>
            <img src='uploads/$image' alt='$category'>
            <div class='card__content'>
              <p class='card__title'>" . ucfirst($category) . "</p>
              <p class='card__description'>test test $category.</p>
            </div>
          </div>";
        }
      } else {
        echo "<p>Aucune image disponible dans cette catégorie.</p>";
      }
      ?>
    </div>
  </div>

  <script>
    function toggleSearch() {
      var searchBar = document.getElementById("search-bar");
      if (searchBar.style.display === "block") {
        searchBar.style.display = "none";
      } else {
        searchBar.style.display = "block";
      }
    }
  </script>

</body>

</html> 