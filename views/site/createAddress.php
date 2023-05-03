<head>
   <link rel="stylesheet" href="/pnss-1/public/assets/css/login.css">
</head>
<section>
    <div>
		<div class="links">
			<a href="<?= app()->route->getUrl('/addresses') ?>">Назад</a>
		</div>
        <form method="post">
          <h3>Добавление адреса проживания работника</h3>
          <h3 class="error"><?= $message ?? ''; ?></h3>
					<h4>Адрес работника</h4>
					<label>Регион <input type="text" name="region"></label>
					<label>Населенный пункт <input type="text" name="locality"></label>
					<label>Улица <input type="text" name="street"></label>
					<label>Дом <input type="text" name="house"></label>
					<label>Корпус (необязательно) <input type="text" name="corps"></label>
					<label>Квартира <input type="text" name="apartment"></label>
					<button class="employee">Зарегистрировать</button>
        </form>
    </div>
</section>