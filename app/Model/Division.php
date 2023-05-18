<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Division extends Model
{
   use HasFactory;

   public $timestamps = false;
   protected $fillable = [
      'name',
      'type'
   ];

   protected static function booted()
   {
       static::created(function ($division) {
           $division->save();
       });
   }

	 protected $with = ['employees'];

   //Связь с таблицей работников подразделений
   public function employees()
   {
    return $this->hasMany(EmployeeInDivision::class);
   }

	 public function type()
   {
      return $this->belongsTo(DivisionType::class, 'division_type_id', 'id');
   }

}