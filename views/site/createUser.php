<head>
   <link rel="stylesheet" href="/pnss-1/public/assets/css/login.css">
</head>
<section>
    <div>
        <form method="post">
            <h3>Создание нового пользователя</h3>
            <h3 class="error"><?= $message ?? ''; ?></h3>
            <label>Имя <input type="text" name="name"></label>
            <label>Логин <input type="text" name="login"></label>
            <label>Пароль <input type="password" name="password"></label>
            <button>Зарегистрировать</button>
        </form>
    </div>
</section>
