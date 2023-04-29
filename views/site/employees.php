<head>
   <link rel="stylesheet" href="/pnss-1/public/assets/css/table.css">
</head>
<table>
    <tr>
        <th>ФИО</th>
        <th>Пол</th>
        <th>Должность</th>
        <th>Отдел</th>
    </tr>
    <tr>
        <?php
        foreach ($employees as $employee) { 
            echo '<th>' . $employee->surname . '' . $employee->name . '' . $employee->patronymic .'</th>';
            echo '<th>' . $employee->gender .'</th>';
            echo '<th>' . $employee->position .'</th>';
        } 
        ?>
    </tr>
</table>

