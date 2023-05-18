<div>
	<div class="links">
		<a href="<?= app()->route->getUrl('/main') ?>">Назад</a>
		<a href="<?= app()->route->getUrl('/createEmployee') ?>">Создать работника</a>
		<a href="<?= app()->route->getUrl('/addresses')?>">Адреса сотрудников</a>
	</div>
	<div class="container">
		<div class="filter">
			<form method="post">
				<h2>Фильтрация</h2>
				<h3>Подразделения</h3>
				<?php foreach ($types as $type) { ?>
					<label><input type="checkbox" name="type[]" value="<?= $type->id ?>"><?= $type->type ?></label>
				<?php } ?>
				<h3>Отделы</h3>
				<?php foreach ($divisions as $division) { ?>
						<label><input type="checkbox" name="division[]" value="<?= $division->id ?>"><?= $division->name ?></label>
				<?php } ?>
				<button class="employee">Искать</button>
			</form>
		</div>
		<table>
			<tr>
				<th>ФИО</th>
				<th>Пол</th>
				<th>Дата приема на работу</th>
				<th>Должность</th>
				<th>Действие</th>
			</tr>
			<?php foreach ($employees as $employee) { ?>
				<tr> 
					<td><?= $employee->surname . ' ' . $employee->name . ' ' . $employee->patronymic ?></td>
					<td><?= $employee->gender ?></td>
					<td><?= $employee->employment_date ?></td>
					<td><?= $employee->position->name ?></td>
					<td>
						<button><a href="<?= app()->route->getUrl('/deleteEmployee') . '?id=' . $employee->id ?>">Удалить</a></button>
						<button><a href="<?= app()->route->getUrl('/updateEmployee') . '?id=' . $employee->id ?>">Изменить</a></button>
					</td>
				</tr>
			<?php } ?> 
		</table>
	</div>
</div>

