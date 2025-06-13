<!DOCTYPE html>
<?php
require_once 'db_restaurant.php';

// Получаем все блюда из базы данных
$query = "SELECT * FROM restaurant_menu ORDER BY id";
try {
    $menu_items = $conn->query($query)->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    die("Ошибка получения данных: " . $e->getMessage());
}
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/animate.css">
	<link rel="icon" href="assets/image/logotype.png" type="image/x-icon">
	<title>Restaurant</title>
</head>
<body>
	<!-- Шапка -->
<?php require_once 'header.php'; ?>

	<!-- Меню ресторана -->
	<div class="main-menu">
		<h1 class="main-menu-h1">Основное меню</h1>
			<?php
			$count = 0;
			$total = count($menu_items);
			foreach ($menu_items as $item) {
				if ($count % 4 == 0) {
					echo '<div class="menu-group wow fadeIn">';
				}
			?>
			<div class="menu-card">
				<div class="menu-card-img">
					<img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>">
				</div>
				<div class="menu-card-text">
					<h1><?php echo htmlspecialchars($item['name']); ?></h1>
					<h2><?php echo htmlspecialchars($item['description']); ?></h2>
				</div>
				<div class="price">
					<h1>от <?php echo htmlspecialchars($item['price']); ?> ₽</h1>
					<button class="menu-price-btn" data-item-id="<?php echo htmlspecialchars($item['id']); ?>">Заказать</button>
				</div>
			</div>

<?php
    $count++;
    if ($count % 4 == 0 || $count == $total) {
        echo '</div>';
    }
}
?>
	</div>
	<!-- Подвал -->
	<?php require_once 'footer.php'; ?>

	<!-- Скрипты -->
	<script src="assets/js/cart.js"></script>
	<script src="assets/js/modals.js"></script>
	<script src="assets/js/init.js"></script>
	<script src="assets/js/wow.min.js"></script>
</body>
</html>