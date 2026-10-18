<?php
// Include the database configuration file
require_once 'dbconfig.php';

try {
    // 1. Define the SQL UPDATE statement with named placeholders
    $sql = "UPDATE grocery_items 
            SET unit_price_thb = :price, stock_quantity = :stock 
            WHERE item_id = :id";

    // 2. Prepare the statement
    $stmt = $pdo->prepare($sql);

    // 3. Define the updated values and target item ID
    $updated_data = [
        'price' => 225.00,  // Updated price for Jasmine Rice
        'stock' => 95,      // Updated stock quantity
        'id'    => 1        // Item ID to update
    ];

    // 4. Execute the query with the parameter array
    $execute = $stmt->execute($updated_data);

    // 5. Check if the update was successful
    if ($execute) {
        echo "<h2>Record Updated Successfully!</h2>";
        echo "<p>Updated Item ID: " . $updated_data['id'] . "</p>";
        echo "<p>New Price: ฿" . $updated_data['price'] . "</p>";
        echo "<p>New Stock Quantity: " . $updated_data['stock'] . "</p>";
    }

} catch (PDOException $e) {
    // Display error message if the query fails
    echo "Error updating record: " . $e->getMessage();
}
?>
