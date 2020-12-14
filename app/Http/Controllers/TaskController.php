<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        return view('tasks.index');

    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);
        /*$request->user()->tasks()->create([
            'name' => $request->name,
        ]);*/
        /*
         auth()->user()->tasks()->create( $request->all() );*/
        $request->user()->tasks()->create( $request->all() );
        return redirect('/tasks');

    }
}
