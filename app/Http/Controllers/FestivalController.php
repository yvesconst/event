<?php

namespace App\Http\Controllers;

use App\Models\Festival;
use Illuminate\Http\Request;

class FestivalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $festivals = Festival::latest()->paginate(5);

        return view('festivals.index',compact('festivals'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('festivals.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'start_at' => 'required',
            'end_on' => 'required',
        ]);

        $isChecked = $request->has('is_active') ? 1 : 0;
        $request->merge([
            'is_active' => $isChecked,
        ]);

        Festival::create($request->all());

        return redirect()->route('festivals.index')
                        ->with('success','Festival created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Festival  $festival
     * @return \Illuminate\Http\Response
     */
    public function show(Festival $festival)
    {
        return view('festivals.show',compact('festival'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Festival  $festival
     * @return \Illuminate\Http\Response
     */
    public function edit(Festival $festival)
    {
        return view('festivals.edit',compact('festival'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Festival  $festival
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Festival $festival)
    {
        $request->validate([
            'name' => 'required',
            'start_at' => 'required',
            'end_on' => 'required',
        ]);

        $isChecked = $request->has('is_active') ? 1 : 0;
        $request->merge([
            'is_active' => $isChecked,
        ]);

        $festival->update($request->all());

        return redirect()->route('festivals.index')
                        ->with('success','Festival updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Festival  $festival
     * @return \Illuminate\Http\Response
     */
    public function destroy(Festival $festival)
    {
        $festival->delete();

        return redirect()->route('festivals.index')
                        ->with('success','Festival deleted successfully');
    }
}
