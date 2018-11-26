<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vacation extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'type', 'status', 'start_at', 'end_at', 'deleted_at', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
