<head>
   <link rel="stylesheet" href="/pnss-1/public/assets/css/table.css">
</head>
<div>
	<div class="links">
		<a href="<?= app()->route->getUrl('/main') ?>">Назад</a>
	</div>
	<div>
		<h3>Средний возраст сотрудников: 
			<?php
				$ageall = 0;
				foreach ($employees as $employee) { 
					$ageall += ($employee->calculate_age($employee->birthday));	
				}
				$average = $ageall/count($employees);
				echo $average;
			?>
		</h3>
	</div>
	<table>
		<tr>
			<th>ФИО</th>
			<th>Дата Рождения</th>
			<th>Возраст</th>
		</tr>
		<?php foreach ($employees as $employee) { ?>
			<tr> 
				<td><?= $employee->surname . ' ' . $employee->name . ' ' . $employee->patronymic ?></td>
				<td><?= $employee->birthday ?></td>
				<td><?= $employee->calculate_age($employee->birthday) ?></td>
			</tr>
		<?php } ?> 
	</table>
</div>
