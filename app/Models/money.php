<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class money extends Model
{
   protected $table = 'money';

   protected $fillable = [
      'user_id',
      'title',
      'amount',
      'type',
      'category',
      'date',
      'description',

   ];
}
