<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('Admin.dashboard');
    }
    public function contact(){
        return view('Admin.contact');
    }
}
