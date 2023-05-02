<head>
   <link rel="stylesheet" href="/pnss-1/public/assets/css/table.css">
</head>
<div>
    <div class="links">
        <a href="<?= app()->route->getUrl('/createUser') ?>">Создать пользователя</a>
    </div>
    <table>
        <tr>
            <th>ФИО</th>
            <th>Логин</th>
            <th>Пароль</th>
            <th>Роль</th>
        </tr>
        <?php
            foreach ($users as $user) { ?>
            <tr>
                <?php
                    echo '<td>' . $user->employee->surname . ' ' . $user->employee->name . ' ' . $user->employee->patronymic . '</td>';
                    echo '<td>' . $user->login . '</td>';
                    echo '<td>' . $user->password .'</td>';
                    echo '<td>' . $user->role .'</td>';
                ?>
            </tr>
        <?php } ?>
    </table>
</div>