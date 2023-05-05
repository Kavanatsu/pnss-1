<head>
   <link rel="stylesheet" href="/pnss-1/public/assets/css/login.css">
</head>
<section>
	<div class="links">
		<a href="<?= app()->route->getUrl('/admin-panel') ?>">Назад</a>
	</div>
    <form method="post">
        <h3>Изменение пользователя</h3>
        <h3 class="error"><?= $message ?? ''; ?></h3>
		<label>Электронная почта <input type="email" name="email" placeholder="<?= $users->email ?>"></label>
		<label for="role">Роль
			<select name="role">
				<option>user</option>
				<option>admin</option>
			</select>
		</label>
        <button class="user">Изменить</button>
    </form>
</section>
