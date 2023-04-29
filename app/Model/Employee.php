<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
   use HasFactory;

   public $timestamps = false;
   protected $fillable = [
      'surname',
      'name',
      'patronymic',
      'gender',
      'birthday',
      'employment_date',
      'dismissal_date',
   ];

   protected static function booted()
   {
       static::created(function ($employee) {
           $employee->save();
       });
   }

   //Связь с таблицей пользователей
   public function user()
   {
    return $this->hasOne(User::class, 'ID_employee', 'ID_employee');
   }

   //Связь с таблицей работников в подразделениях
   public function employeesInDivisions()
   {
    return $this->hasMany(EmployeesInDivisions::class, 'ID_employee', 'ID_employee');
   }

   //Связь с таблицей смены должности по ID
   public function positionChanges() 
   {
      return $this->hasMany(PositionChange::class, 'ID_employee', 'ID_employee');
   }

   //Связь с таблицей адресов
   public function addresses(): BelongsTo
   {
      return $this->belongsTo(Address::class,  'ID_address', 'ID_address');
   }

   //Связь с таблицей смены должности по должности
   public function positionNow(): BelongsTo
   {
      return $this->belongsTo(PositionChange::class,  'ID_position', 'ID_position_new');
   }
}
