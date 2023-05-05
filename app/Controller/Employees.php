<?php

namespace Controller;

use Model\Employee;
use Model\Address;
use Model\Position;
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
        $positions = Position::all();

        if ($request->method === 'GET') {
          return (new View())->render('site.createEmployee', ['employees' => $employees, 'positions' => $positions]);
        }

        if ($request->method === 'POST') {
          Employee::create([
            'surname' => $request->surname,
            'name' => $request->name,
            'patronymic' => $request->patronymic,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'employment_date' => $request->employment_date,
            'position_id' => $request->position_id
          ]);
            app()->route->redirect('/employees');
        }
    }

    public function updateEmployee(Request $request): string
    {    
        $positions = Position::all();

        if ($request->method === 'GET') {
          $employees = Employee::where('id', $request->id)->first();
        }

        if ($request->method === 'POST') {
          $payload = $request->all();
          $employees = Employee::where('id', $request->id)->update($payload);
          app()->route->redirect('/employees');
        }

        return (new View())->render('site.updateEmployee', ['employees' => $employees, 'positions' => $positions]);
    }

    public function deleteEmployee(Request $request)
    {
        $employee = Employee::where('id', $request->id)->first();
        if ($employee->delete()) {
            app()->route->redirect('/employees');
        }
    }
}