<head>
   <link rel="stylesheet" href="/pnss-1/public/assets/css/login.css">
</head>
<section>
    <div>
		<div class="links">
			<a href="<?= app()->route->getUrl('/addresses') ?>">Назад</a>
		</div>
        <form method="post">
          	<h3>Изменение адреса проживания работника</h3>
          	<h3 class="error"><?= $message ?? ''; ?></h3>
			<label>Регион <input type="text" name="region" placeholder="<?= $addresses->region ?>"></label>
			<label>Населенный пункт <input type="text" name="locality" placeholder="<?= $addresses->locality ?>"></label>
			<label>Улица <input type="text" name="street" placeholder="<?= $addresses->street ?>"></label>
			<label>Дом <input type="text" name="house" placeholder="<?= $addresses->house ?>"></label>
			<label>Корпус (необязательно) <input type="text" name="corps" placeholder="<?= $addresses->corps ?>"></label>
			<label>Квартира <input type="text" name="apartment" placeholder="<?= $addresses->apartment ?>"></label>
			<button class="employee">Изменить</button>
        </form>
    </div>
</section>