<?php

namespace App\Http\Controllers;

use App\Models\Laboratory;
use App\Http\Controllers\Controller;
use App\Models\Timeslot;
use App\Models\Day;
use Illuminate\Http\Request;

class LaboratoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $laboratories = Laboratory::all();

        return view('Laboratory/listAllLaboratories', ['laboratories'=>$laboratories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Laboratory/addLaboratory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{

        }
        catch(\Exception $exept){}
        $laboratory = new Laboratory();
        $laboratory->id = $request->room.$request->block;
        $laboratory->description = $request->description;

        $laboratory->save();

        return redirect()->route('laboratory.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Laboratory $laboratory)
    {
        return view('Laboratory/listLaboratory',[
            'laboratory' => $laboratory
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laboratory $laboratory)
    {
        return view('Laboratory/editLaboratory',[
            'laboratory' => $laboratory
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Laboratory $laboratory)
    {
        $laboratory->description = $request->description;

        $laboratory->save();

        return redirect()->route('laboratory.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Laboratory $laboratory)
    {
        $laboratory->delete();

        return redirect()->route('laboratory.index');
    }
}
