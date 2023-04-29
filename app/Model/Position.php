<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
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

   //Связь с таблицей смены должности по новой должности
   public function positionsNew()
   {
    return $this->hasMany(PositionChange::class, 'ID_position', 'ID_position_new');
   }

   //Связь с таблицей смены должности по старой должности
   public function positionsOld()
   {
    return $this->hasMany(PositionChange::class, 'ID_position', 'ID_position_old');
   }
}
