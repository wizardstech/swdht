<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
  protected $casts = [
    'owner' => 'int'
  ];

  protected $dates = [
    'date',
    'email_verified_at'
  ];

  protected $fillable = [
    'title',
    'description',
    'date',
    'owner'
  ];

  public function user()
  {
        return $this->belongsTo(\App\User::class, 'owner');
  }
}
