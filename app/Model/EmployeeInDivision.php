<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class EmployeeInDivision extends Model
{
   use HasFactory;

   public $timestamps = false;

   //Связь с таблицей работников по работнику
   public function employees(): BelongsTo
   {
      return $this->belongsTo(Employee::class,  'ID_employee', 'ID_employee');
   }

   //Связь с таблицей подразделений по подразделению
   public function divisions(): BelongsTo
   {
      return $this->belongsTo(Division::class,  'ID_division', 'ID_division');
   }
}