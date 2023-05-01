<head>
   <link rel="stylesheet" href="/pnss-1/public/assets/css/table.css">
</head>
<div>
	<div class="links">
		<a href="<?= app()->route->getUrl('/main') ?>">Назад</a>
		<a href="<?= app()->route->getUrl('/createEmployee') ?>">Создать работника</a>
	</div>
	<table>
			<tr>
					<th>ФИО</th>
					<th>Пол</th>
					<th>Дата приема на работу</th>
					<th>Должность</th>
			</tr>
					<?php
					foreach ($employees as $employee) { ?>
						<tr> 
							<?php
								echo '<td>' . $employee->surname . ' ' . $employee->name . ' ' . $employee->patronymic .'</td>';
								echo '<td>' . $employee->gender .'</td>';
								echo '<td>' . $employee->employment_date .'</td>';
								echo '<td>' . $employee->ID_position .'</td>';
							?>
						</tr>
					<?php } ?> 
	</table>
</div>

