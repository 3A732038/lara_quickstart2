<?php

namespace App\Http\Controllers;
use App\Models\Task;
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
        //$tasks = Task::where('user_id', $request->user()->id)->get();
        //$tasks= auth()->user()->tasks;
        //$tasks= auth()->user()->tasks()->get();
        //$tasks=Auth::user()->tasks;
        $tasks=Auth::user()->tasks()->get();
        return view('tasks.index', [
            'tasks' => $tasks,
        ]);
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
