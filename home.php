<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="verterre">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap-grid.css">

    <!--Stylesheet-->
    <link rel="stylesheet" type="text/css" href="css/normailze.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">

    <!--Font-->
    <link rel="stylesheet" type="text/css" href="font/web-font.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title><?php echo 'Verterre'; ?></title>
  </head>
  <body>

  <div id="video-container">
    <video id="background-video" autoplay loop muted>
        <source src="img/bg.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>
<div class="content">
    <h1>Verterre.</h1>
    <p>La Communauté des Amoureux des Plantes.</p>
    <button type="button"><span></span> À propos de nous</button>
    <button type="button"><span></span> Évenements</button>
</div>

  <nav class="mask-pattern">
  <a href="#"><img src="uploads/logo verterre.png" alt="VerTerre Logo" style="height: 50px; display: block;"></a>
  <ul class="list">
    <li><a href="#">A propos de nous</a></li>
    <li>
      <a href="categories.php">Plantes</a> 
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
  <ul class="dropdown-menu">
  <li><a href="categories.php?type=fleurs">Fleurs</a></li>
  <li><a href="categories.php?type=succulentes">Succulentes</a></li>
  <li><a href="categories.php?type=plantes-vertes">Plantes Vertes</a></li>
  <li><a href="categories.php?type=herbes-aromatiques">Herbes Aromatiques</a></li>
</ul>
</nav>


  <div class="search-bar" id="search-bar">
    <input type="text" placeholder="Search...">
    <button class="close-search" onclick="toggleSearch()">&times;</button>
  </div>




    <div class="main-container yoga-template">
      <!--Banner section-->
      <div class="banner">
        <div class="banner-overlay"></div>
        <div class="inside-container top-bar">
          <div class="row">
            
            <div class="col-md-4 logo order-1 order-md-12">
              <img class="logo-img" src="" alt="">
            </div> 
            <div class="col-md-4 top-bar-right order-3 order-md-12">
          
            </div>       
          </div>      
        </div>
        <div class="inside-container banner-content">
          <div class="row">
            <div class="col-12 content-col">
              <h1 class="site-title"><?php echo 'Ensemble, faisons pousser un futur plus vert, un jardin à la fois !'; ?></h1>
              <p class="site-title-desc"><?php echo ' VerTerre vous offre l`opportunité d`enrichir votre espace, d`échanger avec une communauté passionnée et de participer à des événements qui célèbrent la biodiversité'; ?></p>
              <a class="banner-btn" href="#"><?php echo 'Rejoignez-nous maintenant'; ?></a>
            </div>
          </div>
        </div>
      </div>
      
      <?php
// Array of yoga classes
$yogaClasses = [
    [
        "title" => "Fleurs",
        "image" => "img/f1.jpg",
        "description" => "les structures colorées et souvent parfumées des plantes, conçues pour la reproduction et appréciées pour leur beauté.",
        "link" => "#"
    ],
    [
        "title" => "Succulentes",
        "image" => "img/succu.jpg",
        "description" => "des plantes dotées de tissus épais qui stockent l'eau, leur permettant de survivre dans des environnements arides.",
        "link" => "#"
    ],
    [
        "title" => "Plantes Vertes",
        "image" => "img/plante.jpg",
        "description" => "des végétaux dotés de chlorophylle, leur donnant leur couleur verte et leur permettant de réaliser la photosynthèse pour produire leur énergie.",
        "link" => "#"
    ],
    [
        "title" => "Herbes",
        "image" => "img/herbes.png",
        "description" => "des plantes utilisées pour leurs feuilles ou tiges parfumées, ajoutant saveur et arôme aux plats ou ayant des propriétés médicinales.",
        "link" => "#"
    ],
];
?>

<div class="yogaPlace-section">
    <div class="row sections-detail">
        <div class="col-12">
            <h2 class="section-title">Nous vous proposons différents types de plantes</h2>
            <p class="section-title-desc">Le choix vous appartient..</p>
        </div>
    </div>
    <div class="inside-container">
        <div class="row yogaPlace-col">
            <?php foreach ($yogaClasses as $class): ?>
                <div class="col-lg-3">
                    <div class="yogaPlace-img">
                        <img src="<?= htmlspecialchars($class['image']); ?>" class="yogaPlace-in-img" alt="">
                    </div>
                    <a href="<?= htmlspecialchars($class['link']); ?>">
                        <h3 class="yogaPlace-title"><?= htmlspecialchars($class['title']); ?></h3>
                    </a>
                    <p class="yogaPlace-desc"><?= htmlspecialchars($class['description']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php


echo '<div class="advantages-section">';
echo '  <div class="row sections-detail">';
echo '    <div class="col-12">';
echo '      <h2 class="section-title">Bienfaits des plantes</h2>';
echo '      <p class="section-title-desc">At solmen li esser necessi uniform grammatica, pronunciation</p>';
echo '    </div>';
echo '  </div>';
echo '  <div class="row advantages-detail">';
echo '    <div class="col-lg-5">';
echo '      <div class="row">';
echo '        <div class="col-12">';
echo '          <div class="advantages-detail-soul">';
echo '            <div class="advantages-detail-img">';
echo '                <g id="Icon_6_">';
echo '                  <g>';
echo '                    <path style="fill-rule:evenodd;clip-rule:evenodd;fill:#FE86D4;" d="M10.065,20.685c0.763-0.161,2.295,0.756,2.514,0.936 c0.482,0.418,0.889,0.856,1.283,1.281c1.154,1.243,2.244,2.418,4.699,2.332c1.912-0.067,3.115,0.813,4.508,1.832 c0.672,0.492,1.367,1,2.202,1.453c0.004,0.002,0.009,0.005,0.015,0.007c0.192,0.091,0.519,0.156,0.985-0.056c0,0,0,0,0,0 c1.165-0.531,2.756-2.672,2.374-4.111c-0.16-0.603-0.717-1.289-2.461-1.133c-2.627,0.232-4.318-0.027-5.027-0.771 c-0.317-0.332-0.433-0.762-0.356-1.314c0.073-0.523,0.403-1.073,0.751-1.656c0.527-0.88,1.124-1.878,1.095-3.142 c-0.015-0.692,0.221-4.335,0.26-4.64c0.016-0.065,0.01-0.137-0.021-0.202c-0.071-0.152-0.252-0.218-0.405-0.148 c-0.002,0-0.003,0.001-0.004,0.002c-1.044,0.491-3.016,2.296-4.194,3.374c-0.061,0.056-0.119,0.109-0.175,0.159 c-1.307-2.138-3.138-2.965-3.219-3c-0.096-0.043-0.208-0.033-0.296,0.027c-0.088,0.059-0.138,0.159-0.134,0.265 c0.001,0.032,0.122,3.206-0.003,4.688c-0.049,0.583-0.207,0.854-0.603,1.035c-0.406,0.185-1.078,0.28-1.962,0.365 c-0.279,0.027-0.503,0.081-0.687,0.164c-0.488,0.222-0.599,0.611-0.697,0.954c-0.079,0.275-0.468,0.535-0.731,0.783 c-0.123,0.116-0.128,0.309-0.012,0.432C9.845,20.683,9.96,20.712,10.065,20.685z M44.635,29.528 c-2.723-0.527-5.31-0.896-7.91-1.13c-0.517-0.046-1.04-0.07-1.556-0.07c-3.377,0-6.135,0.971-8.802,1.911 c-0.752,0.265-1.849,0.529-3.012,0.81c-1.697,0.409-3.451,0.832-4.278,1.298c-0.749,0.422-1.031,0.938-0.839,1.533 c0.281,0.868,1.443,1.255,3.767,1.255c1.553,0,3.472-0.172,5.504-0.354c0.326-0.029,0.658-0.059,0.993-0.089 c-2.778,0.746-5.148,1.124-7.056,1.124c-2.191,0-3.621-0.508-4.025-1.431c-0.286-0.652-0.015-1.472,0.761-2.309l0.115-0.124 l-0.165-0.041c-0.085-0.021-8.558-2.108-10.182-2.464c-0.358-0.078-0.722-0.118-1.081-0.118c-1.291,0-2.34,0.512-2.494,1.217 c-0.075,0.341,0.01,1.008,1.423,1.656l12.385,5.204c0.413,0.152,0.838,0.329,1.288,0.516c1.375,0.571,2.797,1.161,4.118,1.161 c0.55,0,1.076-0.057,1.608-0.175c0.959-0.212,3.38-0.927,5.943-1.685c2.495-0.737,5.076-1.5,6.108-1.732 c0.81-0.182,1.645-0.27,2.553-0.27c1.565,0,3.1,0.263,4.666,0.555l0.533,0.1v-6.277L44.635,29.528z"/>';
echo '                  </g>';
echo '                </g>';
echo '              </svg>';
echo '            </div>';
echo '          </div>';
echo '        </div>';
echo '      </div>';
echo '      <div class="row">';
echo '        <div class="col-12">';
echo '          <div class="advantages-detail-health">';
echo '            <div class="advantages-detail-img">';
echo '                <g id="Icon_10_">';
echo '                  <g>';
echo '                    <path style="fill-rule:evenodd;clip-rule:evenodd;fill:#FE86D4;" d="M36.703,25.762c-0.205-5.767-1.926-11.358-5.408-16.024 c-0.313-0.418-0.669-0.788-1.057-1.105c-1.189-1.821-2.692-3.417-4.646-4.455c-3.094-1.563-6.698-2.267-10.124-2.023 c-6.116,0.426-10.81,3.431-12.68,9.096c-1.509,4.346-0.552,8.716,2.533,12.094c0.524,0.68,1.1,1.346,1.725,1.947 c2.55,2.732,6.04,4.591,9.526,4.84c1.566,0.118,3.155,0.319,4.743,0.208c5.81-0.229,10.509-4.684,11.551-10.473 C36.681,25.846,36.703,25.798,36.703,25.762z"/>';
echo '                  </g>';
echo '                </g>';
echo '              </svg>';
echo '            </div>';
echo '            <a href="#"><h3 class="advantages-detail-title">Renforcement du système immunitaire</h3></a>';
echo '            <p class="advantages-detail-desc">Les plantes, notamment celles qui dégagent des huiles essentielles comme la lavande ou l`eucalyptus, ont des propriétés antibactériennes et antifongiques. Elles aident à stimuler le système immunitaire en réduisant la prolifération des agents pathogènes dans l`air. En outre, leur capacité à purifier l`air et à fournir une atmosphère plus saine aide le corps humain à mieux se défendre contre les infections, ce qui contribue à renforcer la santé globale.</p>';
echo '            <a href="#"><h3 class="advantages-detail-title">Amélioration du sommeil</h3></a>';
echo '            <p class="advantages-detail-desc">Certaines plantes, telles que la lavande, l`aloé vera ou le jasmin, ont des effets relaxants qui peuvent favoriser un meilleur sommeil. L`aromathérapie à base de ces plantes a prouvé qu`elle aide à diminuer le niveau de stress et d`anxiété, facilitant ainsi un sommeil plus profond et réparateur. L`ajout de plantes à la chambre peut donc être un moyen naturel et efficace de lutter contre l`insomnie et d`améliorer la qualité du sommeil.</p>';

echo '          </div>';
echo '        </div>';
echo '      </div>';
echo '    </div>';
echo '  </div>';
echo '</div>';
?>


    
<script src="js/javascript.js">
</script>
  </body>
</html>
