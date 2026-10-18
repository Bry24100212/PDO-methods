<?php
// Include the database configuration file
require_once 'dbconfig.php';

try {
    // 1. Prepare the SQL DELETE statement using a named parameter
    $sql = "DELETE FROM grocery_items WHERE item_id = :id";
    
    $stmt = $pdo->prepare($sql);

    // 2. Specify the item ID you want to delete (e.g., item_id = 16)
    $item_id_to_delete = 16;

    // 3. Execute the statement with the specified ID
    $execute = $stmt->execute(['id' => $item_id_to_delete]);

    // 4. Check if the deletion was successful
    if ($execute) {
        echo "<h2>Record Deleted Successfully!</h2>";
        echo "<p>Deleted Item ID: " . $item_id_to_delete . "</p>";
    }

} catch (PDOException $e) {
    // Display error message if the query fails
    echo "Error deleting record: " . $e->getMessage();
}
?>
