<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
   use HasFactory;

   public $timestamps = false;
   protected $fillable = [
      'region',
      'locality',
      'street',
      'house',
      'corps',
      'apartment'
   ];

   protected static function booted()
   {
       static::created(function ($address) {
           $address->save();
       });
   }

   protected $with = ['employees'];

   //Связь с таблицей работников
   public function employees()
   {
    return $this->hasMany(Employee::class);
   }

}