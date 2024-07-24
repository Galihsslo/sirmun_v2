<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileYayasanController extends Controller
{
    public function index(){
        return view('admin.profileYayasan.index');
    }
}
