<?php

namespace Controller;

use Model\User;
use Model\Employee;
use Src\View;
use Src\Request;
use Src\Auth\Auth;

class CreateUser
{

	public function createUser(Request $request): string
	{
		$users = User::all();
		$employees = Employee::all();

		if ($request->method === 'GET') {
			return (new View())->render('site.createUser', ['users' => $users, 'employees' => $employees]); 
		}

		if ($request->method === 'POST' && User::create($request->all())) {
			app()->route->redirect('/admin-panel');
		}
		
	}

}