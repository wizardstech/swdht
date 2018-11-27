<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ExpenseReportsController extends Controller
{
    public function index(){
		// Ici se trouvera le code qui récupèrera la liste des users
		// la variable $users contient une liste d'articles

    	$users = User::all();

    	//var_dump($users);

	    return view('expense_reports', ['users' => $users]); // La vue users aura accès à la liste sous le nom listeUsers
    }
}
