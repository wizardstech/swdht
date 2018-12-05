<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewRole extends Controller
{
	/*if($request->user_id == $expense_report->user_id)
		return*/
		$role = new User;

		foreach ($expense_report as $key => $user_id)
		{
			if($key = $role->id)
				return view('form_expense_report', $Request->user_id);
		}
}
