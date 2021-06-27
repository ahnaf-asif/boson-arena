<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DraftController extends Controller
{
    public function index(){
        return view('draft');
    }
    public function showCreateForm(){
        return view('new-draft');
    }
    public function create(Request $req)
    {
        dd ($req);
    }
}
