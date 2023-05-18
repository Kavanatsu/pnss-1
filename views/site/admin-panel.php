<div>
    <div class="links">
        <a href="<?= app()->route->getUrl('/main') ?>">Главная страница</a>
        <a href="<?= app()->route->getUrl('/createUser') ?>">Создать пользователя</a>
    </div>
    <table>
        <tr>
            <th>ФИО</th>
            <th>Логин</th>
            <th>Роль</th>
            <th>Действие</th>
        </tr>
        <?php
            foreach ($users as $user) { ?>
            <tr>
                <td><?= $user->employee->surname . ' ' . $user->employee->name . ' ' . $user->employee->patronymic ?></td>
                <td><?= $user->login ?></td>
                <td><?= $user->role ?></td>
                <td>
                    <button><a href="<?= app()->route->getUrl('/deleteUser') . '?id=' . $user->id ?>">Удалить</a></button>
                    <button><a href="<?= app()->route->getUrl('/updateUser') . '?id=' . $user->id ?>">Изменить</a></button>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>