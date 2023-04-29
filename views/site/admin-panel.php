<head>
   <link rel="stylesheet" href="/pnss-1/public/assets/css/table.css">
</head>
<div>
    <a href="<?= app()->route->getUrl('/createUser') ?>">Создать пользователя</a>
    
    <table>
        <tr>
            <th>Логин</th>
            <th>Пароль</th>
            <th>Роль</th>
        </tr>
        <?php
            foreach ($users as $user) { ?>
            <tr>
                <?php
                    echo '<td>' . $user->ID_employee . '</td>';
                    echo '<td>' . $user->login . '</td>';
                    echo '<td>' . $user->password .'</td>';
                    echo '<td>' . $user->role .'</td>';
                ?>
            </tr>
        <?php } ?>
    </table>
</div>