<?php
// Include the database configuration file
require_once 'dbconfig.php';

try {
    // 1. Prepare the SQL INSERT statement using named placeholders
    $sql = "INSERT INTO grocery_items (item_name, brand_name, category, unit_price_thb, net_weight_grams, stock_quantity, expiration_date) 
            VALUES (:item_name, :brand_name, :category, :unit_price_thb, :net_weight_grams, :stock_quantity, :expiration_date)";

    $stmt = $pdo->prepare($sql);

    // 2. Define the record details to be inserted
    $new_item = [
        'item_name'        => 'Thai Crispy Pork Skin 50g',
        'brand_name'       => 'Siam Crisp',
        'category'         => 'Snacks',
        'unit_price_thb'   => 42.00,
        'net_weight_grams' => 50,
        'stock_quantity'   => 100,
        'expiration_date'  => '2027-03-15'
    ];

    // 3. Execute the statement with the parameters
    $execute = $stmt->execute($new_item);

    // 4. Output success message and last inserted ID
    if ($execute) {
        echo "<h2>Record Inserted Successfully!</h2>";
        echo "<p><strong>Inserted Item ID:</strong> " . $pdo->lastInsertId() . "</p>";
    }

} catch (PDOException $e) {
    // Display error message if the query fails
    echo "Error inserting record: " . $e->getMessage();
}
?>
