<?php
// Nạp cấu hình, dữ liệu và hàm helper
$config = require __DIR__ . '/../src/Config/config.php';
$supplies = require __DIR__ . '/../src/Data/supplies.php';
require __DIR__ . '/../src/Helpers/functions.php';

// Xử lý thống kê
$totalTypes = count($supplies);
$totalQuantity = getTotalQuantity($supplies);
$availableSupplies = getAvailableSupplies($supplies);
$availableCount = count($availableSupplies);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $config['app_name']; ?> - Inventory</title>
</head>
<body>
    <h1><?php echo $config['app_name']; ?> - Inventory</h1>

    <h2>Statistics</h2>
    <ul>
        <li>Total supply types: <?php echo $totalTypes; ?></li>
        <li>Total quantity: <?php echo $totalQuantity; ?></li>
        <li>Available supply types: <?php echo $availableCount; ?></li>
    </ul>

    <h2>Supply List</h2>

    <?php foreach ($supplies as $item): ?>
        <div style="margin-bottom: 16px; padding: 8px; border: 1px solid #ccc;">
            <p><strong>Name:</strong> <?php echo formatSupplyName($item['name']); ?></p>
            <p><strong>Group:</strong> <?php echo $item['group']; ?></p>
            <p><strong>Supplier:</strong> <?php echo $item['supplier']; ?></p>
            <p><strong>Year:</strong> <?php echo $item['year']; ?></p>
            <p><strong>Quantity:</strong> <?php echo $item['quantity']; ?></p>
            <p><strong>Status:</strong> <?php echo getStockStatus($item['quantity']); ?></p>
        </div>
    <?php endforeach; ?>
    
    <p><a href="/">Back to Home</a></p>
</body>
</html>