<head>
   <link rel="stylesheet" href="/pnss-1/public/assets/css/table.css">
</head>
<div>
	<a href="<?= app()->route->getUrl('/main') ?>">Назад</a>
	<table>
			<tr>
					<th>ФИО</th>
					<th>Старая должность</th>
					<th>Новая должность</th>
					<th>Дата смены должности</th>
					<th>Работник отдела кадров</th>
			</tr>
					<?php
					foreach ($positionChanges as $positionChange) { ?>
						<tr>
							<?php
							echo '<td>' . $positionChange->ID_employee.'</td>';
							echo '<td>' . $positionChange->ID_position_old .'</td>';
							echo '<td>' . $positionChange->ID_position_new .'</td>';
							echo '<td>' . $positionChange->change_date .'</td>';
							echo '<td>' . $positionChange->ID_user_changer .'</td>';
							?>
						</tr>
					<?php } ?>
	</table>
</div>