<?php

namespace App\Http\Controllers\TimerStatus;

use App\Http\Controllers\Controller;
use App\TimerStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimerStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        $timerStatus = TimerStatus::where('user_id', $user->id)->first();

//        $format
//
//        $timerStatus['start_time']

        return response()->json($timerStatus);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = Auth::user()->id;

        if ($timerStatus = TimerStatus::where('user_id', '=', $userId)->first()) {
            $this->update($request, $timerStatus);

            return response()->json($timerStatus);
        }

        $timerStatus = TimerStatus::Create([
            'is_start' => $request->is_start,
            'user_id' => $userId,
            'start_time' => $request->start_time
        ]);

        return response()->json($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TimerStatus $timerStatus)
    {
        $rules = [
            'is_start' => 'required'
        ];

        $this->validate($request, $rules);

        if (!$timerStatus) {
            $this->store($request);
        }

        $user = Auth::user();

        $timerStatus['is_start'] = $request->is_start;
        $timerStatus['user_id'] = $request->user()->id;
        $timerStatus['start_time'] = $request->start_time;

        $timerStatus->save();

        return response()->json($timerStatus);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
