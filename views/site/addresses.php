<head>
   <link rel="stylesheet" href="/pnss-1/public/assets/css/table.css">
</head>
<div>
	<div class="links">
		<a href="<?= app()->route->getUrl('/employees') ?>">Назад</a>
		<a href="<?= app()->route->getUrl('/createAddress') ?>">Добавить адрес</a>
	</div>
	<table>
		<tr>
			<th>ФИО</th>
			<th>Адрес</th>
			<th>Действие</th>
		</tr>
			<?php foreach($addresses as $address) { ?>
				<?php foreach ($address['employees'] as $el) { ?>
					<tr>
						<td><?= $el['surname'].' '.$el['name'].' '.$el['patronymic'] ?></td>
						<?php { ?>
							<td><?= $address['region'].', '.$address['locality'].', ул. '.$address['street'].' '.$address['house']?>
							<?php if($address['corps'] or $address['apartment'] !== NULL){
								if($address['corps'] !== NULL){ echo ', корпус '.$address['corps'];} 
								if($address['apartment'] !== NULL){ echo', кв. '.$address['apartment'];}
								}?></td>
						<?php } ?>
						<td>
							<button><a href="<?= app()->route->getUrl('/deleteAddress') . '?id=' . $address['id'] ?>">удалить</a></button>
							<button><a href="<?= app()->route->getUrl('/updateAddress') . '?id=' . $address['id'] ?>">Изменить</a></button>
						</td>
					</tr>
				<?php } ?>
			<?php } ?>
	</table>
</div>