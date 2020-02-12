<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tasks;
use DB;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$model = DB::table('tasks')
                ->join('users', 'users.id', '=', 'tasks.created_by')
				->where('assigned_to', Auth::id())
				->orWhere('created_by', Auth::id())->get();
	$status = \Config::get('constants.status_values');

        return view('task.index', ['model' => $model, 'status'=>$status]);
    }
	
	public function showdet($id)
    {
		$model = Tasks::find($id);
		$status = \Config::get('constants.status_values');
		$model->status = isset($status[$model->status]) ? $status[$model->status] : $model->status;
		return $model->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$users = DB::table('users')->select('id', 'name')->get();
		$status = \Config::get('constants.status_values');
		return view('task.create', compact('status', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
			'task'=>'required',
			'description'=> 'required',
			'end_date' => 'required|date',
			'start_date' => 'required|date',
			'assigned_to' => 'required'
		]);
		$tasks = new Tasks([
			'task' => $request->get('task'),
			'description'=> $request->get('description'),
			'end_date'=> $request->get('end_date'),
			'start_date'=> $request->get('start_date'),
			'status'=> 1,
			'assigned_to'=> $request->get('assigned_to'),
			'created_on'=> date('Y-m-d h:i:s'),
			'created_by'=> Auth::id(), 
		]);
      $tasks->save();
      return redirect('/task')->with('success', 'Task has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Tasks::find($id);
		$status = \Config::get('constants.status_values');
		return view('task.view', compact('task','status'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Tasks::find($id);
		$users = DB::table('users')->select('id', 'name')->get();
		$status = \Config::get('constants.status_values');
		return view('task.edit', compact('task', 'status', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
			'task'=>'required',
			'description'=> 'required',
			'end_date' => 'required|date',
			'start_date' => 'required|date',
			'assigned_to' => 'required',
			'status' => 'required'
		]);
		
		$task = Tasks::find($id);
		$task->task = $request->get('task');
		$task->description = $request->get('description');
		$task->end_date = $request->get('end_date');
		$task->start_date = $request->get('start_date');
		$task->assigned_to = $request->get('assigned_to');
		$task->status = $request->get('status');
		$task->save();

		return redirect('/task')->with('success', 'Task has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Tasks::find($id);
		$task->delete();

		return redirect('/task')->with('success', 'Task has been deleted Successfully');
    }
}
