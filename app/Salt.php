<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salt extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id', 'comment', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
