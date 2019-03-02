<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class Invoice extends Model implements HasMedia
{
  use SoftDeletes;
  use HasMediaTrait;

  const STATUS = [
    'validated',
    'denied',
    'pending'
  ];

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
