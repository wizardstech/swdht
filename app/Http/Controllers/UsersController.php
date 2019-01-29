<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use DB;

class usersController extends Controller
{
    public function index()
    {
      $users = User::all()->paginate(5);
		// Ici se trouvera le code qui récupèrera la liste des users
		// la variable $users contient une liste d'articles
	    return view('users/index', ['users' => $users]); // La vue users aura accès à la liste sous le nom listeUsers
    }
  	public function user()
  	{
		// Ici se trouvera le code qui récupèrera un user
		// la variable $user contient un seul user
	    return view('user', ['user' => $user]); // La vue user aura accès à un seul user sous le nom user
    }

    public function user_list(Request $request)
    {
    	 $userDef = new User;

      $userDef->name = $request->input('name');
      $userDef->email = $request->input('email');
        if(Auth::user()->role == 'admin')
        {
            $expenseReports = User::all();
        }
        return view('user', ['user_list' => $userDef]);
    }

    public function show(Request $request)
    {
    	$user = User::findOrFail($request->id);

    	return view('users/show', ['users' => $user]);
    }

    public function save(Request $request)
    {
    	if (isset($request->users_id))
          $users = User::findOrFail($request->users_id);
      else
          $users = new User;
          $users->name = $request->input('name');
          $users->email = $request->input('email');
          $users->created_at = $request->input('created_at');
          $users->save();
      return redirect('users')->with('status', 'Nouvelle Utilisateur');
    }

    public function modify(Request $request)
    {
    $users = User::findOrFail($request->id);
  	return view('users/form', ['users' => $users]);
  	}

	public function delete(Request $request)
  {
   $user = User::findOrFail($request->id);
   $user->delete();
   return redirect('users')->with('status', 'Utilisateur supprimer');
  }

  public function new()
  {
    return view('users/new');
  }
}