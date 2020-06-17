<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Calendar;
use App\User;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->acceptsAnyContentType()) 
        {
			$user = \Auth::user();
			$start = request()->has('start') ? date('Y-m-d 0:0:0', strtotime(request()->start)) : '';
			$end = request()->has('end') ? date('Y-m-d 0:0:0', strtotime(request()->end)) : '';
			$data = $user->calendars()->whereDate('start', '>=', $start)->whereDate('start', '<=', $end)->get();
			foreach ($data as $item) {
				$item['backgroundColor'] = $item['background_color'];
				$item['borderColor'] = $item['border_color'];
				$item['allDay'] = $item['all_day'];
				unset($item['background_color']);
				unset($item['border_color']);
				unset($item['all_day']);
			}
			return response()->json($data);
        }
        return view('admin.calendar.calendar');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$dataForm = $request->validate([
			'all_day' =>['bail', 'nullable', 'regex:/^true|false|1|0$/i'],
			'start' =>'bail|nullable|date',
			'title' =>'bail|string|max:255',
			'background_color' =>'bail|nullable|string|max:255',
			'border_color' =>'bail|nullable|string|max:255',
			'url' =>'bail|nullable|string|max:255',
		]);
		if ($dataForm['all_day'] === 'true' || $dataForm['all_day'] == 1) {
			$dataForm['all_day'] = 1;
		}
		else {
			$dataForm['all_day'] = 0;
		}
		$dataForm['start'] = date('Y-m-d H:i:s', strtotime($dataForm['start']));
		$user = \Auth::user();
		$calendar = $user->calendars()->create($dataForm);
		return response()->json($calendar);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request)
    {
		$dataForm = $request->validate([
			'id' =>['exists:calendars'],
			'all_day' =>['bail', 'nullable', 'regex:/^true|false|1|0$/i'],
			'start' =>'bail|nullable|date',
			'end' =>'bail|nullable|date',
		]);
		$calendar = Calendar::find($dataForm['id']);
		if ($dataForm['all_day'] === 'true' || $dataForm['all_day'] == 1) {
			$dataForm['all_day'] = 1;
		}
		else {
			$dataForm['all_day'] = 0;
		}
		$dataForm['start'] = date('Y-m-d H:i:s', strtotime($dataForm['start']));
		if (isset($dataForm['end'])) {
			$dataForm['end'] = date('Y-m-d H:i:s', strtotime($dataForm['end']));
		}
		$calendar = $calendar->update($dataForm);
		return response()->json($calendar);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
		$calendar = Calendar::findOrFail($request->id)->delete();
		return response()->json($calendar);
    }
}
