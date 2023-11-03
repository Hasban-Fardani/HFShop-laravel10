<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    //
    public function index(){
        $user = auth()->user();
        return view("user.profile",compact("user"));
    }
}
