<section>
    <h2>Войдите в систему чтобы начать работу</h2>
    <div>
        <?php
        if (!app()->auth::check()):
        ?>
        <form method="post">
            <h3>Авторизация</h3>
            <h3 class="error"><?= $message ?? ''; ?></h3>
						<input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
            <label>Логин <input type="text" name="login"></label>
            <label>Пароль <input type="password" name="password"></label>
            <button>Войти</button>
        </form>
        <?php endif; ?>
    </div>
</section>        