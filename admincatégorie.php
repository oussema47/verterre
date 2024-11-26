<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "verterre";


$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$searchQuery = '';
if (isset($_POST['search'])) {
    $searchQuery = $_POST['search'];
}

$sql = "SELECT id_catégorie, id_plante, nom_plante, id_utilisateur FROM catégorie WHERE id_catégorie  LIKE '%$searchQuery%' OR id_plante LIKE '%$searchQuery%' OR nom_plante LIKE '%$searchQuery%' OR id_utilisateur LIKE '%$searchQuery%' ";

$result = $conn->query($sql);

if (!$result) {
    die("catégorie not found: " . $conn->error);
}


if (isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];

   
    $delete_sql = "DELETE FROM catégorie WHERE id_catégorie = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param('i', $delete_id);

    if ($stmt->execute()) {
       
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        die("Error deleting catégorie: " . $conn->error);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>catégorie</title>
    
    <style>
       
        .confirmation-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }
        .confirmation-modal .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            text-align: center;
        }
        .confirmation-modal button {
            padding: 10px 20px;
            margin: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<link rel="stylesheet" href="dashboard.css">
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
    <div class="dashboard-container">
       
        <nav class="sidebar">
            <div class="sidebar-header">
                <h3>Dashboard</h3>
            </div>
            <ul>
                <li><a href="#">Blogs</a></li>
                <li class="active"><a href="admincatégorie.php">Catégorie</a></li>
                <li><a href="#">Evenements</a></li>
                <li><a href="#">Participation Evenement</a></li>
                <li><a href="adminplante.php">Plantes</a></li>
                <li><a href="#">Transaction</a></li>
                <li><a href="dashboard.php">Utilisateurs</a></li>
            </ul>
        </nav>

       
        <div class="content">
            <div class="table-header">
                <h2>catégorie</h2>
                <div class="table-controls">
                    <form method="POST" action="">
                        <input type="text" name="search" placeholder="Search" value="<?php echo htmlspecialchars($searchQuery); ?>">
                        <button type="submit">Search</button>
                    </form>
                    <button class="add-button"><a href="plante/annonceplante.php">+ Add</a></button>
                </div>
            </div>
            
            <div class="table-container">
                <table id="example" class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID_Categorie</th>
                            <th>ID_Plante</th>
                            <th>nom_plante</th>
                            <th>id_utilisateur</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['id_catégorie']); ?></td>
                                    <td><?php echo htmlspecialchars($row['id_plante']); ?></td>
                                    <td><?php echo htmlspecialchars($row['nom_plante']); ?></td>
                                    <td><?php echo htmlspecialchars($row['id_utilisateur']); ?></td>
                                    <td>
                                        <form method="POST" style="display: inline;">
                                            <input type="hidden" name="id_catégorie" value="<?php echo $row['id_catégorie']; ?>">
                                            <button class="edit-button">Edit</button>
                                        </form>
                                        <button class="delete-button" onclick="showConfirmation(<?php echo $row['id_catégorie']; ?>)">Delete</button>
                                    </td>
                                </tr>
                            <?php } 
                        } else { ?>
                            <tr>
                                <td colspan="7">No catégorie found.</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

   
    <div id="confirmation-modal" class="confirmation-modal">
        <div class="modal-content">
            <h3>Are you sure you want to delete this catégorie?</h3>
            <form method="POST">
                <input type="hidden" id="delete-id" name="delete_id">
                <button type="submit">Yes, Delete</button>
                <button type="button" onclick="closeConfirmation()">Cancel</button>
            </form>
        </div>
    </div>

    <script>
        function showConfirmation(id) {
            document.getElementById('delete-id').value = id;
            document.getElementById('confirmation-modal').style.display = 'flex';
        }

        function closeConfirmation() {
            document.getElementById('confirmation-modal').style.display = 'none';
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="script.js"></script>
</body>
</html>

<?php $conn->close(); ?>
