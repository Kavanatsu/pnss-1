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
			'address_id',
      'position_id'
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

	public function calculate_average_age($employees) {
		$ageall = 0;
		foreach ($employees as $employee) { 
			$ageall += ($employee->calculate_age($employee->birthday));	
		}
		$average = $ageall/count($employees);
		return $average;
	}

   protected $with = ['user', 'employeeInDivisions'];
   
   //Связь с таблицей пользователей
   public function user()
   {
    return $this->hasOne(User::class);
   }
   
   //Связь с таблицей должности 
   public function position()
   {
      return $this->belongsTo(Position::class);
   }
   
   //Связь с таблицей адресов
   public function address()
   {
      return $this->belongsTo(Address::class);
   }

 	//Связь с таблицей работников в подразделениях
   public function employeeInDivisions()
   {
    return $this->hasOne(EmployeeInDivision::class);
   }


   
   


}
