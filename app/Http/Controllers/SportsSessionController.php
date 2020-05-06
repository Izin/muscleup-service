<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\SportsSession;
use StringFormatingHelper;


class SportsSessionController extends Controller
{
    const VALIDATION_SCHEMA = [
      'date_session'      => 'required|date',
      'duration_minutes'  => 'required|integer|digits_between:0,120',
      'pull_ups'          => 'required|integer|digits_between:0,100',
      'push_ups'          => 'required|integer|digits_between:0,100',
      'is_running'        => 'boolean',
      'comment'           => 'string|min:0|max:1000',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      StringFormatingHelper::formatDuration(2);
      $SportsSessions = SportsSession::all();

      return view('list', compact('SportsSessions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $SportsSession = (object) [
          'id'               => -1,
          'date_session'     => date("Y-m-d"),
          'duration_minutes' => 15,
          'pull_ups'         => 0,
          'push_ups'         => 0,
          'is_running'       => false,
          'comment'          => "",
        ];
        return view('edit', compact('SportsSession'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validatedData = $request->validate(self::VALIDATION_SCHEMA);
      $show = SportsSession::create($validatedData);

      return redirect('/sessions')
        ->with('success', 'Sports session was successfully saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $SportsSession = SportsSession::findOrFail($id);

      return view('edit', compact('SportsSession'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $SportsSession = SportsSession::findOrFail($id);

      return view('edit', compact('SportsSession'));
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
      $validatedData = $request->validate(self::VALIDATION_SCHEMA);
      SportsSession::whereId($id)->update($validatedData);

      return redirect('/sessions')
        ->with('success', 'Sports session was successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $SportsSession = SportsSession::findOrFail($id);
        $SportsSession->delete();

        return redirect('/sessions')
          ->with('success', 'Sports session was successfully deleted!');
    }
}
