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
	if ($request->method === 'POST' && User::create($request->all())) {
		app()->route->redirect('/admin-panel');
	}
	return new View('site.createUser');
}

}