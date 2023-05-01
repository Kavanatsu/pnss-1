<?php

namespace Controller;

use Model\Employee;
use Src\View;

class Employees
{
    public function showEmployees(): string
    {  
        $employees = Employee::all();
        return (new View())->render('site.employees', ['employees' => $employees]);
    }

		public function employeesAge(): string
    {  
        $employees = Employee::all();
        return (new View())->render('site.employeesAge', ['employees' => $employees]);
    }

		public function createEmployee(): string
    {  
        $employees = Employee::all();
        return (new View())->render('site.createEmployee', ['employees' => $employees]);
    }

}