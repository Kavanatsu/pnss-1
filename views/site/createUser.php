<head>
   <link rel="stylesheet" href="/pnss-1/public/assets/css/login.css">
</head>
<section>
	<div class="links">
		<a href="<?= app()->route->getUrl('/admin-panel') ?>">Назад</a>
	</div>
    <form method="post">
        <h3>Создание нового пользователя</h3>
        <h3 class="error"><?= $message ?? ''; ?></h3>
        <label>Имя 	
			<select name="employee_id">
				<?php foreach ($employees as $employee) { ?>
                   	<option value="<?= $employee->id ?>"> <?= $employee->surname . ' ' . $employee->name . ' ' . $employee->patronymic ?> </option>;
				<?php } ?>
			</select>	
		</label>
        <label>Логин <input type="text" name="login"></label>
        <label>Пароль <input type="password" name="password"></label>
		<label>Электронная почта <input type="email" name="email"></label>
		<label for="role">Роль
			<select name="role">
				<option>user</option>
				<option>admin</option>
			</select>
		</label>
        <button class="user">Зарегистрировать</button>
    </form>
</section>
