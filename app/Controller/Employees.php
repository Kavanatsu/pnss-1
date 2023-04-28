<?php

namespace Controller;

use Model\Employee;
use Src\View;

class Employees
{
    public function showEmployees(): string
    {  
        $employees = Employee::all();
        // var_dump(new View())->render('table.employees', ['employees' => $employees]);
        return (new View())->render('site.employees', ['employees' => $employees]);
    }
}