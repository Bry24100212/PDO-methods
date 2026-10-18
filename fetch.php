<?php
// Include your database configuration
require_once 'dbconfig.php';

try {
    // 1. Prepare an SQL statement targeting a specific item by ID
    $stmt = $pdo->prepare("SELECT * FROM grocery_items WHERE item_id = :id");
    
    // 2. Execute the query by supplying the specific item ID
    $stmt->execute(['id' => 1]); // Change 1 to any item_id you want
    
    // 3. Fetch the single matching record as an associative array
    $item = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // 4. Print the array formatted with <pre> tags
    if ($item) {
        echo "<pre>";
        print_r($item);
        echo "</pre>";
    } else {
        echo "No item found with that ID.";
    }

} catch (PDOException $e) {
    echo "Error fetching record: " . $e->getMessage();
}
?>
