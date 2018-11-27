<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UsersModel as Users; // Nous déclarons l'utilisation du modèle ArticlesModel, qu'on appellera Users pour la suite

class usersController extends Controller
{
    public function users(){
		// Ici se trouvera le code qui récupèrera la liste des users
		// la variable $users contient une liste d'articles
	    return view('users', ['listeUsers' => $users]); // La vue users aura accès à la liste sous le nom listeUsers
    }
	public function user(){
		// Ici se trouvera le code qui récupèrera un user
		// la variable $user contient un seul user
	    return view('user', ['user' => $user]); // La vue user aura accès à un seul user sous le nom user
    }
}