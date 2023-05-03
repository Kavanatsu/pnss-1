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
          // var_dump($request->all());die();
          if (Address::create([
            'region' => $request->region,
            'locality' => $request->locality,
            'street' => $request->street,
            'house' => $request->house,
            'corps' => $request->corps,
            'apartment' => $request->apartment,
          ])){
            var_dump(Address::where('id', $request->id));die();
            if(Employee::create([
              'surname' => $request->surname,
              'name' => $request->name,
              'patronymic' => $request->patronymic,
              'gender' => $request->gender,
              'birthday' => $request->birthday,
              'employment_date' => $request->employment_date,
              'address_id' => Address::where('region', $request->region)
                                      ->where('locality', $request->locality)
                                      ->where('street', $request->street)
                                      ->where('house', $request->house)
                                      ->where('corps', $request->corps)
                                      ->where('apartment', $request->apartment)->get('id'),
            ])){
              app()->route->redirect('/employees');
            }
          }
        }
    }

}