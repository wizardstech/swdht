<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\NewInvoice;
use App\Invoice;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


      $chuck = json_decode(file_get_contents('https://api.chucknorris.io/jokes/random'), true);

      return view('home', compact('chuck'));
    }
}
