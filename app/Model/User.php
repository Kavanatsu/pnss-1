<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Src\Auth\IdentityInterface;

class User extends Model implements IdentityInterface
{
   use HasFactory;

   public $timestamps = false;
   protected $fillable = [
       'login',
       'password',
       'email',
       'role'
   ];

   protected static function booted()
   {
       static::created(function ($user) {
           $user->password = md5($user->password);
           $user->save();
       });
   }

   //Выборка пользователя по первичному ключу
   public function findIdentity(int $id)
   {
       return self::where('ID_employee', $id)->first();
   }

   //Возврат первичного ключа
   public function getId(): int
   {
       return $this->ID_employee;
   }

   //Возврат аутентифицированного пользователя
   public function attemptIdentity(array $credentials)
   {
       return self::where(['login' => $credentials['login'],
           'password' => ($credentials['password'])])->first();
   }

   //Есть ли роль текущего пользователя в массиве ролей
   public function hasRole($roles): bool
   {
       return in_array($this->role, $roles);
   }
}
