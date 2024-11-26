<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "verterre";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle search functionality
$searchQuery = '';
if (isset($_POST['search'])) {
    $searchQuery = $_POST['search'];
}

$sql = "SELECT id_utilisateur, nom, prenom, email, role FROM utilisateur WHERE nom LIKE '%$searchQuery%' OR prenom LIKE '%$searchQuery%' OR email LIKE '%$searchQuery%' OR role LIKE '%$searchQuery%'";
$result = $conn->query($sql);

if (!$result) {
    die("user not found: " . $conn->error);
}
// Handle delete functionality
if (isset($_POST['delete_id'])) {
    $delete_id = $_POST['delete_id'];

    // Prepare SQL statement to delete the user
    $delete_sql = "DELETE FROM utilisateur WHERE id_utilisateur = ?";
    $stmt = $conn->prepare($delete_sql);
    $stmt->bind_param('i', $delete_id);

    if ($stmt->execute()) {
        // Redirect to refresh the page after deletion
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        die("Error deleting user: " . $conn->error);
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
    <div class="dashboard-container">
        <!-- Sidebar -->
        <nav class="sidebar">
            <div class="sidebar-header">
                <h3>Dashboard</h3>
            </div>
            <ul>
                <li><a href="#">Blogs</a></li>
                <li><a href="admincatégorie.php">Catégorie</a></li>
                <li><a href="#">Evenements</a></li>
                <li><a href="#">Participation Evenement</a></li>
                <li><a href="adminplante.php">Plantes</a></li>
                <li><a href="#">Transaction</a></li>
                <li class="active"><a href="dashboard.php">Utilisateurs</a></li>
                
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="content">
            <div class="table-header">
                <h2>Users</h2>
                <div class="table-controls">
    <form method="POST" action="">
        <input type="text" name="search" placeholder= "Search" value="<?php echo htmlspecialchars($searchQuery); ?>">
        <button type="submit">Search</button>
    </form>
    <label>
        <input type="checkbox"> Show Inactive Users
    </label>
    <button class="add-button"><a href="utilisateur/formulaire.php">+ Add</a></button>
</div>

            </div>
            
            <div class="table-container">
                <table id="example" class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Statut</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            $i = 1;
                            while ($row = $result->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $i++; ?></td>
                                    <td><?php echo htmlspecialchars($row['nom'] . ' ' . $row['prenom']); ?></td>
                                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                                    <td><?php echo htmlspecialchars($row['role']); ?></td>
                                    <td>
                                        <?php echo ($row['role'] == 'utilisateur') ? 'Active' : ''; ?>
                                    </td>
                                    <td>
    <form method="POST" style="display: inline;">
        <input type="hidden" name="id_utilisateur" value="<?php echo $row['id_utilisateur']; ?>">
        <button class="edit-button">Edit</button>
    </form>
    <button class="delete-button" onclick="showConfirmation(<?php echo $row['id_utilisateur']; ?>)">Delete</button>
</td>
</tr>
<?php } 
} else { ?>
    <tr>
        <td colspan="6">No user found.</td>
    </tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>

<!-- Confirmation Modal -->
<div id="confirmation-modal" class="confirmation-modal">
    <div class="modal-content">
        <h3>Are you sure you want to delete this user?</h3>
        <form method="POST">
            <input type="hidden" id="delete-id" name="delete_id">
            <button type="submit">Yes, Delete</button>
            <button type="button" onclick="closeConfirmation()">Cancel</button>
        </form>
    </div>
</div>

<script>
    function showConfirmation(id) {
        // Set the hidden input value to the delete ID
        document.getElementById('delete-id').value = id;
        // Show the confirmation modal
        document.getElementById('confirmation-modal').style.display = 'flex';
    }

    function closeConfirmation() {
        // Hide the confirmation modal
        document.getElementById('confirmation-modal').style.display = 'none';
    }
</script>

<!-- Modal Styling (add this to your CSS) -->
<style>
    .confirmation-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(0, 0, 0, 0.5);
        align-items: center;
        justify-content: center;
    }

    .modal-content {
        background: white;
        padding: 20px;
        border-radius: 8px;
        text-align: center;
    }

    .modal-content button {
        margin: 10px;
        padding: 10px;
    }
</style>


</script>
<script src=https://code.jquery.com/jquery-3.7.1.js></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="script.js"></script>
</body>
</html>

<?php $conn->close(); ?>
