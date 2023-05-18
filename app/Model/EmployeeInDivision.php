<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class EmployeeInDivision extends Model
{
   use HasFactory;

	 protected $table = 'employee_in_divisions';

   public $timestamps = false;

   //Связь с таблицей работников
   public function employees()
   {
      return $this->belongsTo(Employee::class);
   }

   //Связь с таблицей подразделений 
   public function divisions()
   {
      return $this->belongsTo(Division::class);
   }
}