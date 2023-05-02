<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
   use HasFactory;

   public $timestamps = false;
   protected $fillable = [
      'name',
      'salary',
      'education'
   ];

   protected static function booted()
   {
       static::created(function ($position) {
           $position->save();
       });
   }

   protected  $with = ['employee'];

   //Связь с таблицей работников
   public function employee()
   {
    return $this->hasMany(Employee::class);
   }  
}
