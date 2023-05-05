<head>
   <link rel="stylesheet" href="/pnss-1/public/assets/css/table.css">
</head>
<div>
	<div class="links">
		<a href="<?= app()->route->getUrl('/main') ?>">Назад</a>
		<a href="<?= app()->route->getUrl('/createEmployee') ?>">Создать работника</a>
		<a href="<?= app()->route->getUrl('/addresses')?>">Адреса сотрудников</a>
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

