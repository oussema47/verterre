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

$sql = "SELECT id_plante, nom, catégorie, description, prix, quantité, image FROM plante WHERE nom LIKE '%$searchQuery%' OR catégorie LIKE '%$searchQuery%' OR description LIKE '%$searchQuery%' OR prix LIKE '%$searchQuery%' OR quantité LIKE '%$searchQuery%' OR image LIKE '%$searchQuery%'";

$result = $conn->query($sql);

if (!$result) {
    die("Plante not found: " . $conn->error);
}


if (isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];

    $delete_sql = "DELETE FROM plante WHERE id_plante = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param('i', $delete_id);

    if ($stmt->execute()) {
   
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        die("Error deleting plant: " . $conn->error);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plantes</title>
    
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
                <li><a href="admincatégorie.php">Catégorie</a></li>
                <li><a href="#">Evenements</a></li>
                <li><a href="#">Participation Evenement</a></li>
                <li class="active"><a href="adminplante.php">Plantes</a></li>
                <li><a href="#">Transaction</a></li>
                <li><a href="dashboard.php">Utilisateurs</a></li>
            </ul>
        </nav>


        <div class="content">
            <div class="table-header">
                <h2>Plantes</h2>
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
                            <th>Nom</th>
                            <th>Catégorie</th>
                            <th>Description</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($row['nom']); ?></td>
                                    <td><?php echo htmlspecialchars($row['catégorie']); ?></td>
                                    <td><?php echo htmlspecialchars($row['description']); ?></td>
                                    <td><?php echo htmlspecialchars($row['prix']); ?></td>
                                    <td><?php echo htmlspecialchars($row['quantité']); ?></td>
                                    <td><?php echo htmlspecialchars($row['image']); ?></td>
                                    <td>
                                        <form method="POST" style="display: inline;">
                                            <input type="hidden" name="id_plante" value="<?php echo $row['id_plante']; ?>">
                                            <button class="edit-button">Edit</button>
                                        </form>
                                        <button class="delete-button" onclick="showConfirmation(<?php echo $row['id_plante']; ?>)">Delete</button>
                                    </td>
                                </tr>
                            <?php } 
                        } else { ?>
                            <tr>
                                <td colspan="7">No plants found.</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <div id="confirmation-modal" class="confirmation-modal">
        <div class="modal-content">
            <h3>Are you sure you want to delete this plant?</h3>
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
