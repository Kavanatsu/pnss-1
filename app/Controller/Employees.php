<?php

namespace Controller;

use Model\Employee;
use Model\Address;
use Model\Position;
use Model\Division;
use Model\DivisionType;
use Model\EmployeeInDivision;
use Src\View;
use Src\Request;
use Src\Validator\Validator;

class Employees
{
    public function showEmployees(Request $request): string
    {  
        $employees = Employee::all();
				// $types = Division::all('type')->unique('type');
				$divisions = Division::all();
				$types = DivisionType::all();
				$employeesInDivisions = EmployeeInDivision::all();
				// var_dump(EmployeeInDivision::first()->id);die();

				if ($request->method === 'GET') {
					return (new View())->render('site.employees', ['employees' => $employees, 'divisions' => $divisions, 'types' => $types]);
				}

				if ($request->method === 'POST') {
					$typeFilters = $request->type;
					$divisionFilters = $request->division;
					// foreach ($typeFilters as $typeFilter){
					// 	var_dump($employees = Employee::where('id', EmployeeInDivision::where('division_id', Division::where('division_type_id', DivisionType::where('id', $typeFilter)
					// 	->pluck('id')->toArray())
					// 	->pluck('id')->toArray())
					// 	->pluck('employee_id')->toArray())
					// 	->get()->toArray());die();
					// }
					
					foreach ($typeFilters as $typeFilter){
							$employees = Employee::where('id', EmployeeInDivision::where('division_id', Division::where('division_type_id', DivisionType::where('id', $typeFilter)
																		->pluck('id')->toArray())
																		->pluck('id')->toArray())
																		->pluck('employee_id')->toArray())
																		->get();
					}
					// foreach ($divisionFilters as $divisionFilter){
					// 	var_dump($employees = Division::where('division_type_id', $divisionFilter)
					// 												->pluck('id')->toArray());die();
					// }	
					// var_dump($divisionFilters);die();
					foreach ($divisionFilters as $divisionFilter){
						$employees = Employee::where('id', EmployeeInDivision::where('division_id', Division::where('division_type_id', $divisionFilter)
																	->pluck('id')->toArray())
																	->pluck('employee_id')->toArray())
																	->get();
					}					
					return (new View())->render('site.employees', ['employees' => $employees, 'divisions' => $divisions, 'types' => $types]);
					// foreach ($filters as $filter){
					// 	var_dump($employees = DivisionType::where('id', $filter)->pluck('id'));
					// }die();
					// var_dump($employees = Employee::where('id', EmployeeInDivision::where('division_id', Division::where('id', DivisionType::where('id', $request->type)))));die();
					// var_dump($types = DivisionType::where('id', $el)->get());die();
				}
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

        if ($request->method === 'POST') {

          $validator = new Validator($request->all(), [
            'surname' => ['required', 'cyrillic'],
            'name' => ['required', 'cyrillic'],
            'patronymic' => ['required', 'cyrillic'],
            'gender' => ['required'],
            'birthday' => ['required'],
            'employment_date' => ['required'],
          ], [
            'required' => 'Поле :field пусто',
            'cyrillic' => 'Поле :field должно состоять из кириллицы'
          ]);
       
          if($validator->fails()){
            return new View('site.createEmployee',
              ['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'employees' => $employees, 'positions' => $positions]);
          }

          if (Employee::create([
            'surname' => $request->surname,
            'name' => $request->name,
            'patronymic' => $request->patronymic,
            'gender' => $request->gender,
            'birthday' => $request->birthday,
            'employment_date' => $request->employment_date,
            'position_id' => $request->position_id
          ])) {
            app()->route->redirect('/employees');
          }
        }
    
        return (new View())->render('site.createEmployee', ['employees' => $employees, 'positions' => $positions]); 
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