<?php
session_start();
include 'cars.php';

function isLoggedIn() {
    return isset($_SESSION['user']);
}

function filterCars($arr, $brand = '', $country = '', $category = '') {
    return array_filter($arr, function($car) use ($brand, $country, $category) {
        $ok = true;
        if ($brand && $car['brand'] !== $brand) $ok = false;
        if ($country && $car['country'] !== $country) $ok = false;
        if ($category && $car['category'] !== $category) $ok = false;
        return $ok;
    });
}

$brand = $_GET['brand'] ?? '';
$country = $_GET['country'] ?? '';
$category = $_GET['category'] ?? '';
$cars = filterCars($arr, $brand, $country, $category);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Car Catalog</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/modern-overrides.css">
</head>
<body>
    <header>
        <h1>Car Catalog</h1>
        <nav>
            <?php if (isLoggedIn()): ?>
                <span>Welcome, <?= htmlspecialchars($_SESSION['user']['name']) ?></span>
                <a href="logout.php">Logout</a>
            <?php else: ?>
                <a href="login.php">Login</a>
            <?php endif; ?>
        </nav>
    </header>
    <section>
        <form method="get" class="filter-form">
            
            <label>Brand:
                <select name="brand">
                    <option value="" <?= $brand===''?'selected':'' ?>>All</option>
                    <option value="Toyota" <?= $brand==='Toyota'?'selected':'' ?>>Toyota</option>
                    <option value="BMW" <?= $brand==='BMW'?'selected':'' ?>>BMW</option>
                    <option value="Ferrari" <?= $brand==='Ferrari'?'selected':'' ?>>Ferrari</option>
                    <option value="Lamborghini" <?= $brand==='Lamborghini'?'selected':'' ?>>Lamborghini</option>
                    <option value="Mazda" <?= $brand==='Mazda'?'selected':'' ?>>Mazda</option>
                    <option value="Pagani" <?= $brand==='Pagani'?'selected':'' ?>>Pagani</option>
                    <option value="Lada" <?= $brand==='Lada'?'selected':'' ?>>Lada</option>
                </select>
            </label>
            <label>Country:
                <select name="country">
                    <option value="" <?= $country===''?'selected':'' ?>>All</option>
                    <option value="Japan" <?= $country==='Japan'?'selected':'' ?>>Japan</option>
                    <option value="Russia" <?= $country==='Russia'?'selected':'' ?>>Russia</option>
                    <option value="Germany" <?= $country==='Germany'?'selected':'' ?>>Germany</option>
                    <option value="Italy" <?= $country==='Italy'?'selected':'' ?>>Italy</option>
                </select>
            </label>
            <label>Category:
                <select name="category">
                    <option value="" <?= $category===''?'selected':'' ?>>All</option>
                    <option value="sedan" <?= $category==='sedan'?'selected':'' ?>>Sedan</option>
                    <option value="sport" <?= $category==='sport'?'selected':'' ?>>Sport</option>
                    <option value="jdm" <?= $category==='jdm'?'selected':'' ?>>JDM</option>
                    <option value="exotic" <?= $category==='exotic'?'selected':'' ?>>Exotic</option>
                </select>
            </label>
            <button type="submit" class="btn-main"><span style="font-size:1.2em;">🔎</span> Filter</button>
        </form>
        <div class="cars-list">
            <?php if (count($cars) === 0): ?>
                <div class="no-cars">🙁 No cars found for your filter.</div>
            <?php endif; ?>
            <?php foreach ($cars as $car): ?>
                <div class="car-card">
                    <div class="car-img" style="background-image: url('image/<?= $car['id'] ?>.jpg')"></div>
                    <h2><?= htmlspecialchars($car['brand']) ?> <?= htmlspecialchars($car['model']) ?></h2>
                    <div class="car-meta">
                        <span><?= htmlspecialchars($car['year']) ?>, <?= htmlspecialchars($car['country']) ?></span>
                        <span class="car-price"><?= htmlspecialchars($car['price']) ?></span>
                    </div>
                    <a href="car.php?id=<?= $car['id'] ?>" class="btn-secondary"><span style="font-size:1.2em;">ℹ️</span> Details</a>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</body>
</html>
