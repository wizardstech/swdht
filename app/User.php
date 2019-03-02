<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use \Illuminate\Database\Eloquent\SoftDeletes;

use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;

class User extends Authenticatable implements HasMedia
{
    use SoftDeletes;
    use Notifiable;
    use HasRoles;
    use HasMediaTrait;

    protected $dates = [
        'birthdate',
        'email_verified_at'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $fillable = [
        'username',
        'firstname',
        'lastname',
        'birthdate',
        'email',
        'email_verified_at',
        'password',
        'remember_token'
    ];

    public function invoices()
    {
        return $this->hasMany(\App\Invoice::class, 'invoice', 'id');
    }

    public function absences()
    {
        return $this->hasMany(\App\Absence::class, 'absence', 'id');
    }

    public function getFullNameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";
    }

    public static function getAdmins()
    {
        return self::whereHas("roles", function ($q) {
            $q
        ->where("name", "inquisitor")
        ->orWhere('name', "superadmin");
        })->get();
    }
}
