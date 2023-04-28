<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
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

   

}