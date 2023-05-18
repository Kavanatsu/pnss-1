<?php
return [
  //Класс аутентификации
  'auth' => \Src\Auth\Auth::class,
  //Клас пользователя
  'identity'=>\Model\User::class,
	//Классы для middleware
	'routeMiddleware' => [
		'auth' => \Middlewares\AuthMiddleware::class,
    'role' => \Middlewares\RoleMiddleware::class,
		'trim' => \Middlewares\TrimMiddleware::class,
		'specialChars' => \Middlewares\SpecialCharsMiddleware::class,
		'csrf' => \Middlewares\CSRFMiddleware::class,
  ],
  //Валидаторы
  'validators' => [
    'required' => \Validators\RequireValidator::class,
    'unique' => \Validators\UniqueValidator::class,
    'login' => \Validators\LoginValidator::class,
    'cyrillic' => \Validators\CyrillicValidator::class,
    'region' => \Validators\RegionValidator::class
  ]
];
