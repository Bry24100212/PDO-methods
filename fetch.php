<?php
// Include the database configuration file
require_once 'dbconfig.php';

try {
    // 1. Prepare an SQL statement to fetch a single record (e.g., item with item_id = 1)
    $stmt = $pdo->prepare("SELECT * FROM grocery_items WHERE item_id = :id");
    
    // 2. Execute the query by binding the parameters
    $stmt->execute(['id' => 1]);
    
    // 3. Fetch a single record as an associative array using fetch()
    $grocery_item = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // 4. Display the single record cleanly using <pre> tags and print_r()
    echo "<pre>";
    print_r($grocery_item);
    echo "</pre>";

} catch (PDOException $e) {
    // Display error message if the query fails
    echo "Error fetching record: " . $e->getMessage();
}
?>
