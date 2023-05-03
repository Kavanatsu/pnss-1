<?php

namespace Controller;

use Model\Employee;
use Model\Address;
use Src\View;
use Src\Request;

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

		public function createEmployee(Request $request): string
    {  
        $employees = Employee::all();

        if ($request->method === 'GET') {
          return (new View())->render('site.createEmployee', ['employees' => $employees]);
        }

        if ($request->method === 'POST') {
          Employee::create([
            'surname' => $request->surname,
            'name' => $request->name,
            'patronymic' => $request->patronymic,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'employment_date' => $request->employment_date]);
            app()->route->redirect('/employees');
        }
    }
}