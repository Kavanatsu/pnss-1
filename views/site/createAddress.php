<section>
		<div class="links">
			<a href="<?= app()->route->getUrl('/addresses') ?>">Назад</a>
		</div>
		<div>
        <form method="post">
          	<h3>Добавление адреса проживания работника</h3>
          	<h3 class="error"><?= $message ?? ''; ?></h3>
		  	<h4>Выберите работника: </h4>
		  	<label>ФИО
				<select name="employee_id">
					<?php foreach ($employees as $employee) { ?>
                   		<option value="<?= $employee->id?>"> <?= $employee->surname . ' ' . $employee->name . ' ' . $employee->patronymic ?> </option>;
					<?php } ?>
				</select>
			</label>
			<h4>Адрес работника</h4>
			<label>Регион <input type="text" name="region"></label>
			<label>Населенный пункт <input type="text" name="locality"></label>
			<label>Улица <input type="text" name="street"></label>
			<label>Дом <input type="text" name="house"></label>
			<label>Корпус (необязательно) <input type="text" name="corps"></label>
			<label>Квартира (необязательно) <input type="text" name="apartment"></label>
			<button class="employee">Добавить</button>
        </form>
    </div>
</section>