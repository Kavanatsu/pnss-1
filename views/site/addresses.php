<head>
   <link rel="stylesheet" href="/pnss-1/public/assets/css/table.css">
</head>
<div>
	<div class="links">
		<a href="<?= app()->route->getUrl('/main') ?>">Назад</a>
	</div>
	<table>
		<tr>
			<th>ФИО</th>
			<th>Адрес</th>
		</tr>
			<?php foreach($addresses as $address) { ?>
				<?php foreach ($address['employees'] as $el) { ?>
						<tr>
							<td><?= $el['surname'].' '.$el['name'].' '.$el['patronymic'] ?></td>
							<?php if ($address['corps'] == NULL) { ?>
								<td><?= $address['region'].', '.$address['locality'].', ул. '.$address['street'].' '.$address['house'].', кв. '.$address['apartment'] ?></td>
							<?php } else { ?>
								<td><?= $address['region'].', '.$address['locality'].', ул. '.$address['street'].' '.$address['house'].', корпус '.$address['corps'].', кв. '.$address['apartment'] ?></td>
							<?php } ?>
							
						</tr>
				<?php } ?>
			<?php } ?>
	</table>
</div>