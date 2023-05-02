<head>
   <link rel="stylesheet" href="/pnss-1/public/assets/css/table.css">
</head>
<div>
	<div class="links">
		<a href="<?= app()->route->getUrl('/main') ?>">Назад</a>
	</div>
	<div>
		<h3>Средний возраст сотрудников: 
		</h3>
	</div>
	<table>
		<tr>
			<th>ФИО</th>
			<th>Дата Рождения</th>
			<th>Возраст</th>
		</tr>
			<?php
				foreach ($employees as $employee) { ?>
					<tr> 
						<?php
							echo '<td>' . $employee->surname . ' ' . $employee->name . ' ' . $employee->patronymic .'</td>';
							echo '<td>' . $employee->birthday .'</td>';
							echo '<td>' . $employee->calculate_age($employee->birthday) .'</td>';
						?>
					</tr>
				<?php } ?> 
	</table>
</div>
