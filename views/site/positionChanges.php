<head>
   <link rel="stylesheet" href="/pnss-1/public/assets/css/table.css">
</head>
<table>
    <tr>
        <th>ФИО</th>
        <th>Старая должность</th>
        <th>Новая должность</th>
        <th>Дата смены должности</th>
        <th>Работник отдела кадров</th>
    </tr>
    <tr>
        <?php
        foreach ($employees as $employee) { 
            echo '<th>' . $employee->surname . '' . $employee->name . '' . $employee->patronymic .'</th>';
        } ?>
    </tr>
</table>