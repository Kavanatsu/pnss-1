<head>
   <link rel="stylesheet" href="/pnss-1/public/assets/css/login.css">
</head>
<section>
    <div>
		<div class="links">
			<a href="<?= app()->route->getUrl('/employees') ?>">Назад</a>
		</div>
        <form method="post">
            <h3>Создание нового работника</h3>
            <h3 class="error"><?= $message ?? ''; ?></h3>
			<h4>Данные работника</h4>
			<label>Фамилия <input type="text" name="surname"></label>
			<label>Имя <input type="text" name="name"></label>
			<label>Отчество <input type="text" name="patronymic"></label>
			<label>Пол 
				<input type="radio" name="gender" id="M" value="М">
				<label for="M">Мужской</label>
				<input type="radio" name="gender" id="F" value="Ж">
				<label for="F">Женский</label>
			</label>
			<label>Дата Рождения <input type="date" name="birthday"></label>
			<label>Дата приема на работу <input type="date" name="employment_date"></label>
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