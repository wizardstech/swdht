<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenseReport extends Model
{
    /**
	 * Get the owner of the expense report.
	 */
	public function user()
	{
	    return $this->belongsTo('App\User');
	}
}
