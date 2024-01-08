<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function load_dashboard(){
      $users =   User::whereNotIn('id', [ auth()->user()->id])->get();
        return view('dashboard', compact('users'));
    }
}
