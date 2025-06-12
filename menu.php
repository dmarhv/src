<!DOCTYPE html>
<?php
require_once 'db_menu.php';

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
	<!-- Подвал (footer) -->
	<?php require_once 'footer.php'; ?>
	<script src="assets/js/profile.js"></script>
	<script src="assets/js/wow.min.js"></script>
	<script>
		new WOW().init();
		
		// Каунтер для кнопки заказать
		document.querySelectorAll('.menu-price-btn').forEach(button => {
			let clickCount = 0;
			
			const counterHTML = `
				<div style="display: flex; align-items: center; justify-content: space-between; width: 100%; padding: 0 5px;">
					<span style="cursor: pointer; font-size: 24px; font-weight: bold; line-height: 1;">-</span>
					<span style="min-width: 20px; text-align: center; font-size: 20px; font-weight: bold;">1</span>
					<span style="cursor: pointer; font-size: 24px; font-weight: bold; line-height: 1;">+</span>
				</div>
			`;
			
			button.addEventListener('click', function(e) {
				if (clickCount === 0) {
					this.innerHTML = counterHTML;
					this.style.backgroundColor = '#4e4f52';
					this.style.transition = 'background-color 0.3s ease';
					this.style.padding = '5px 10px';
					this.style.minWidth = '120px';
					
					const minusBtn = this.querySelector('span:first-child');
					const numberSpan = this.querySelector('span:nth-child(2)');
					const plusBtn = this.querySelector('span:last-child');
					
					minusBtn.addEventListener('click', (e) => {
						e.stopPropagation();
						if (clickCount > 0) {
							clickCount--;
							numberSpan.textContent = clickCount;
							if (clickCount === 0) {
								this.innerHTML = 'Заказать';
								this.style.backgroundColor = '';
								this.style.minWidth = '';
								this.style.padding = '';
								clickCount = 0;
							}
						}
					});
					
					plusBtn.addEventListener('click', (e) => {
						e.stopPropagation();
						clickCount++;
						numberSpan.textContent = clickCount;
					});
				}
			});
		});
	</script>
</body>
</html>