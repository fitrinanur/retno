<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Treatment;

class TreatmentController extends Controller
{
    public function index()
    {
        $treatments = Treatment::all();
        return view('treatments.index',compact('treatments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = $this->types();
        return view('treatments.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $treatment = new \App\Treatment();
        $treatment->name = $request->name;
        $treatment->category = $request->category;
        $treatment->price = $request->price;
        $treatment->save();

        return redirect()->route('treatment.index');
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
        $treatment = Treatment::find($id);
        $types = $this->types();
        return view('treatments.edit',compact('treatment','types'));
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
        $treatment = Treatment::findOrFail($id);
        $treatment->name = $request->name;
        $treatment->category = $request->name;
        $treatment->price = $request->price;
        $treatment->update();

        return redirect()->route('treatment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $treatment = Treatment::findOrFail($id);
        $treatment->delete();

        return redirect()->route('treatment.index');
    }

    public function types()
    {
        return $types =
        [
            '1' => 'face',
            '2' => 'body',
            '3' => 'hair',
            '4' => 'special'
        ];
    }
}
