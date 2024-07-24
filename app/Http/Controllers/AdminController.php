<?php

namespace App\Http\Controllers;

use App\Models\artikel;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ariktel = artikel::all();
        $user = User::all();
        return view('admin.index', ['user' => $user, 'artikel' => $ariktel]);
        // return view('404');
    }

    public function halaman()
    {
        $user = User::all();
        return view('index', ['user' => $user]);
        // return view('404');
    }

    public function layout()
    {
        $user = User::all();
        return view('layout.admin.index', ['user' => $user]);
        // return view('404');
    }

    public function profile(){

        return view('admin.profile');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
