<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
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

	 public function calculate_age($birthday) {
		$birthday_timestamp = strtotime($birthday);
		$age = date('Y') - date('Y', $birthday_timestamp);
		if (date('md', $birthday_timestamp) > date('md')) {
			$age--;
		}
		return $age;
		}

		public function calculate_average_age() {
			$ageall = 0;
			foreach ($employees as $employee) { 
				$ageall += ($employee->calculate_age($employee->birthday));	
			}
			$average = $ageall/count($employees);
			return $average;
		}

   //Связь с таблицей пользователей
   public function user()
   {
    return $this->hasOne(User::class, 'ID_employee', 'ID_employee');
   }

   //Связь с таблицей работников в подразделениях
   public function employeesInDivisions()
   {
    return $this->hasManyThrough(Division::class, EmployeeInDivision::class, 'ID_employee', 'ID_division');
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
