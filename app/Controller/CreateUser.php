<?php

namespace Controller;

use Model\User;
use Model\Employee;
use Src\View;
use Src\Request;
use Src\Auth\Auth;
use Src\Validator\Validator;

class CreateUser
{

	public function createUser(Request $request): string
	{
		$users = User::all();
		$employees = Employee::all();

		if ($request->method === 'POST') {

			$validator = new Validator($request->all(), [
				'employee_id' => ['required'],
				'login' => ['required', 'unique:users,login', 'login'],
				'password' => ['required'],
				'email' => ['required']
			], [
				'required' => 'Поле :field пусто',
				'unique' => 'Поле :field должно быть уникально',
				'login' => 'Поле :field может включать в себя только цифры и латинские буквы',
			]);
	 
			if($validator->fails()){
				return new View('site.createUser',
					['message' => json_encode($validator->errors(), JSON_UNESCAPED_UNICODE), 'users' => $users, 'employees' => $employees]);
			}

			if (User::create($request->all())) {
				app()->route->redirect('/admin-panel');
			}	
		}

		return (new View())->render('site.createUser', ['users' => $users, 'employees' => $employees]); 
	}

}