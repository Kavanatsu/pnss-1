<?php

namespace Controller;

// use Model\Post;
// use Model\User;
use Src\View;
use Src\Request;
use Src\Auth\Auth;

class Site
{
	public function mainPage(): string
	{
		return new View('site.mainPage');
	}

	public function adminPanel(): string
	{
		return new View('site.admin-panel');
	}

	public function login(Request $request): string
	{
		//Если просто обращение к странице, то отобразить форму
		if ($request->method === 'GET') {
				return new View('site.login');
		}
		//Если удалось аутентифицировать пользователя, то редирект
		if (Auth::attempt($request->all())) {
			if (Auth::user()->role === 'admin'){
				app()->route->redirect('/admin-panel');
			} else {
				app()->route->redirect('/main');
			}
		}
		//Если аутентификация не удалась, то сообщение об ошибке
		return new View('site.login', ['message' => 'Неправильные логин или пароль']);
	}

	public function logout(): void
	{
		Auth::logout();
		app()->route->redirect('/login');
	}
	
	// public function signup(Request $request): string
	// {
	// 	if ($request->method === 'POST' && User::create($request->all())) {
	// 		app()->route->redirect('/go');
	// 	}
	// 	return new View('site.signup');
	// }

	// public function index(Request $request): string
	// {
	// 	$users = User::all()->get();
	// 	return (new View())->render('site.post', ['posts' => $users]);
	// }
}
