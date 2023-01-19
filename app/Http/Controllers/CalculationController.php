<?php

namespace App\Http\Controllers;

use App\Models\Calculation;
use Illuminate\Http\Request;

class CalculationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($calculation_id)
    {
        // if err ?? 
        $calculation = Calculation::find($calculation_id);
        return view('admin.calculations.calculation')->with(compact('calculation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // ?? create and store
        return view('admin.calculations.add_calculations');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();

        $calculation = new Calculation;
        // id ??
        $calculation->calculator_name = $data['calculation_name'];
        $calculation->created_at = now();
        $check = Calculation::where('calculation_name', $data['calculation_name'])->first();
        if ($check) {
            Session()->flash('error', 'calculation is exist');
            return Redirect::back();
        }
        $calculation->save();
        Session()->put('message', 'Store successfully');
        return Redirect::to('/calculations/show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Calculation  $calculation
     * @return \Illuminate\Http\Response
     */
    public function show(Calculation $calculation)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Calculation  $calculation
     * @return \Illuminate\Http\Response
     */
    public function edit(Calculation $calculation)
    {
        //
        // ?? edit ?? update
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Calculation  $calculation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $calculation_id)
    {
        //
        $calculation = Calculation::find($calculation_id);
        $calculation->updated_at = now();
        $calculation->update($request->all());
        Session()->put('message', 'update successfully');
        return Redirect::to('/calculations/show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calculation  $calculation
     * @return \Illuminate\Http\Response
     */
    public function destroy($calculation_id)
    {
        // if err ??
        $calculation = Calculation::find($calculation_id);
        $calculation->delete();
        Session()->put('message', 'Delete successfully');
        return Redirect::to('/calculations/show');
    }
}
