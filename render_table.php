<?php
// Include the database configuration file
require_once 'dbconfig.php';

try {
    // 1. Query all records from the database
    $stmt = $pdo->prepare("SELECT * FROM grocery_items");
    $stmt->execute();
    $groceries = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Error fetching data: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Grocery Items Result Set</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            font-family: Arial, sans-serif;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

    <h2>Thailand Grocery Items</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Item Name</th>
                <th>Brand Name</th>
                <th>Category</th>
                <th>Price (THB)</th>
                <th>Net Weight (g)</th>
                <th>Stock</th>
                <th>Expiration Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($groceries as $item): ?>
                <tr>
                    <td><?= htmlspecialchars($item['item_id']) ?></td>
                    <td><?= htmlspecialchars($item['item_name']) ?></td>
                    <td><?= htmlspecialchars($item['brand_name']) ?></td>
                    <td><?= htmlspecialchars($item['category']) ?></td>
                    <td>฿<?= htmlspecialchars(number_format($item['unit_price_thb'], 2)) ?></td>
                    <td><?= htmlspecialchars($item['net_weight_grams']) ?>g</td>
                    <td><?= htmlspecialchars($item['stock_quantity']) ?></td>
                    <td><?= htmlspecialchars($item['expiration_date']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
