<head>
   <link rel="stylesheet" href="/pnss-1/public/assets/css/table.css">
</head>
<div>
	<a href="<?= app()->route->getUrl('/main') ?>">Назад</a>
	<table>
			<tr>
					<th>ID</th>
					<th>Адрес</th>
			</tr>
					<?php
					foreach ($addresses as $address) { ?>
						<tr> 
							<?php
								echo '<td>' . $address->ID_address . '</td>';
								if ($address->corps == NULL) {
									echo '<td>' . $address->region . ', ' . $address->locality . ', ул. ' . $address->street . ' ' . $address->house . ', кв. ' . $address->apartment .'</td>';
								} else {
								echo '<td>' . $address->region . ', ' . $address->locality . ', ул.' . $address->street . ' ' . $address->house . ', корпус ' . $address->corps . ', кв. ' . $address->apartment .'</td>';
								} ?>
						</tr>
					<?php } ?> 
	</table>
</div>