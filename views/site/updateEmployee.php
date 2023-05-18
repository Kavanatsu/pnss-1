<section>
		<div class="links">
			<a href="<?= app()->route->getUrl('/employees') ?>">Назад</a>
		</div>
		<div>
        <form method="post">
            <h3>Изменение данных о работнике</h3>
            <h3 class="error"><?= $message ?? ''; ?></h3>
			<h4>Данные работника</h4>
			<label>Фамилия <input type="text" name="surname" placeholder="<?= $employees->surname ?>"></label>
			<label>Имя <input type="text" name="name" placeholder="<?= $employees->name ?>"></label>
			<label>Отчество <input type="text" name="patronymic" placeholder="<?= $employees->patronymic ?>"></label>
			<label>Пол 
				<input type="radio" name="gender" id="M" value="М">
				<label for="M">Мужской</label>
				<input type="radio" name="gender" id="F" value="Ж">
				<label for="F">Женский</label>
			</label>
			<label>Дата Рождения <input type="date" name="birthday"></label>
			<label>Дата приема на работу <input type="date" name="employment_date"></label>
			<label>Должность 
				<select name="position_id">
					<?php foreach ($positions as $position) { ?>
						<option value="<?= $position->id ?>"><?= $position->name ?></option>
					<?php } ?>
				</select>
			</label>
			<button class="employee">Изменить</button>
        </form>
    </div>
</section>