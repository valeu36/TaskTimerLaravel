<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
        $userId = Auth::user()->id;

        $tasks = Task::where('user_id', '=', $userId)->get();

        $formatedTasks = [];


        foreach ($tasks as $task) {
            $timeSpent = 0;

            $timeSpent += $task->start_time->diffInSeconds($task->end_time);

            $formatedTime['start_time'] = $task->start_time->format('H:i:s');
            $formatedTime['end_time'] = $task->end_time->format('H:i:s');
            $formatedTime['task_name'] = $task->task_name;
            $formatedTime['id'] = $task->id;
            $formatedTime['time_spent'] = gmdate('H:i:s', $timeSpent);

            array_push($formatedTasks, $formatedTime);
        }

        return response()->json($formatedTasks);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'start_time' => 'required',
            'end_time' => 'required',
            'task_name' => 'required'
        ];

//        dd($request);

        $this->validate($request, $rules);

        $task = Task::create([
           'start_time' => $request->start_time,
           'end_time' => $request->end_time,
           'task_name' => $request->task_name,
           'user_id' => Auth::user()->id,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);

        $task->delete();

        return response()->json($task);
    }

    public function timeSpent() {
        $userId = Auth::user()->id;

        $tasks = Task::where('user_id', '=', $userId)->get();

        $totalSpent = 0;

        foreach ($tasks as $task) {
            $totalSpent += $task->start_time->diffInSeconds($task->end_time);
        }

        return response()->json(gmdate('H:i:s', $totalSpent));
    }
}
