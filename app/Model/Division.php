<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
   use HasFactory;

   public $timestamps = false;
   protected $fillable = [
      'name',
      'type_division'
   ];

   protected static function booted()
   {
       static::created(function ($division) {
           $division->save();
       });
   }

   //Связь с таблицей работников подразделений по подразделению
   public function divisions()
   {
    return $this->hasMany(EmployeeInDivision::class, 'ID_division', 'ID_division');
   }

}