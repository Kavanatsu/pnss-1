<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class PositionChange extends Model
{
   use HasFactory;

   public $timestamps = false;
   protected $fillable = [
      'ID_position_old',
      'ID_position_new',
      'change_date'
   ];

   protected static function booted()
   {
       static::created(function ($positionchange) {
           $positionchange->save();
       });
   }

   //Связь с таблицей работников по окончательной должности
   public function positionNew()
   {
    return $this->hasMany(Employee::class, 'ID_position_new', 'ID_position');
   }

   //Связь с таблицей работников по работнику
   public function employees(): BelongsTo
   {
      return $this->belongsTo(Employee::class,  'ID_employee', 'ID_employee');
   }

   //Связь с таблицей должностей по новой должности
   public function positionNewFK(): BelongsTo
   {
      return $this->belongsTo(Position::class,  'ID_position_new', 'ID_position');
   }

   //Связь с таблицей должностей по старой должности
   public function positionOldFK(): BelongsTo
   {
      return $this->belongsTo(Position::class,  'ID_position_old', 'ID_position');
   }

   //Связь с таблицей пользователей по пользователю
   public function userChanger(): BelongsTo
   {
      return $this->belongsTo(User::class,  'ID_employee', 'ID_employee');
   }
}
