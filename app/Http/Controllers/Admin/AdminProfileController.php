<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Province;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    //
    public function index(){
        $this->middleware(["auth", "userIsAdmin"]);
        $cities = City::all();
        $provinces = Province::all();
        return view("admin.profile", compact(["cities", "provinces"]));
    }
}
