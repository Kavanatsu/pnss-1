<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class DivisionType extends Model
{
   use HasFactory;

   public $timestamps = false;
   protected $fillable = [
      'type'
   ];

   protected static function booted()
   {
       static::created(function ($divisionType) {
           $divisionType->save();
       });
   }

	 protected $with = ['divisions'];

   public function divisions()
   {
    return $this->hasMany(Division::class, 'id', 'division_type_id');
   }

}