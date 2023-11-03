<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    //
    public function __construct() {
        $this->middleware(["userIsNotAdmin", "auth"]);
    }
    public function index()
    {   
        $user = Auth::user();
        return view("user.dashboard", compact("user"));
    }
}
