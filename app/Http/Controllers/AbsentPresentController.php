<?php

namespace App\Http\Controllers;

use App\AbsentPresent;
use Illuminate\Http\Request;

class AbsentPresentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = AbsentPresent::paginate(env('PAGINATIONS','10'));
        return view('panel.absentpresents.index')->withItems($items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('panel.absentpresents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        AbsentPresent::create($request->all());
        return redirect()->route('panel.absentpresents.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AbsentPresent  $absentPresent
     * @return \Illuminate\Http\Response
     */
    public function show(AbsentPresent $absentPresent)
    {
        return view('panel.absentpresents.show')->withItem($absentPresent);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AbsentPresent  $absentPresent
     * @return \Illuminate\Http\Response
     */
    public function edit(AbsentPresent $absentPresent)
    {
        return view('panel.absentpresents.edit')->withItem($absentPresent);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AbsentPresent  $absentPresent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AbsentPresent $absentPresent)
    {
        $absentPresent->update($request->all());
        return redirect()->route('panel.absentpresents.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AbsentPresent  $absentPresent
     * @return \Illuminate\Http\Response
     */
    public function destroy(AbsentPresent $absentPresent)
    {
        $absentPresent->delete();
        return redirect()->route('panel.absentpresents.index');
    }

    public function absent($id)
    {
        AbsentPresent::find($id)->update(['present' => false]);
        return redirect()->route('panel.absentpresents.index');
    }

    public function present($id)
    {
        AbsentPresent::find($id)->update(['present' => true]);
        return redirect()->route('panel.absentpresents.index');
    }

}
