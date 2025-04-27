<?php
session_start();
include 'cars.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: index.php');
    exit;
}
$car = null;
foreach ($arr as $item) {
    if ($item['id'] == $id) {
        $car = $item;
        break;
    }
}
if (!$car) {
    echo "<h2>Car not found</h2>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($car['brand']) ?> <?= htmlspecialchars($car['model']) ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/modern-overrides.css">
</head>
<body>
    <header>
    <a href="index.php" class="btn-secondary btn-back">
        <span style="font-size:1.3em;">&#8592;</span> Back to catalog
    </a>
</header>
<section>
    <div class="car-details-modern">
        <div class="car-details-img" style="background-image: url('image/<?= $car['id'] ?>.jpg')"></div>
        <div class="car-details-info">
            <h1><?= htmlspecialchars($car['brand']) ?> <?= htmlspecialchars($car['model']) ?></h1>
            <div class="car-details-meta">
                <span><b>Year:</b> <?= htmlspecialchars($car['year']) ?></span>
                <span><b>Country:</b> <?= htmlspecialchars($car['country']) ?></span>
                <span><b>Category:</b> <?= htmlspecialchars($car['category']) ?></span>
            </div>
            <div class="car-details-price">
                <b>Price:</b> <span><?= htmlspecialchars($car['price']) ?></span>
            </div>
        </div>
    </div>
</section>
</body>
</html>
