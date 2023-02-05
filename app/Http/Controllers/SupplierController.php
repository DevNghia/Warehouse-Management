<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
        $data = $request->all();
        $newSupplier = new Supplier;
        $newSupplier->supplier_name = $data["supplier_name"];
        $newSupplier->created_at = now();
        $err = Supplier::where('supplier_name', $data["supplier_name"])->first();
        if($err) {
            session()->flash('warning', 'This Supplier is exist');
            return Redirect::back();
        }
        $newSupplier->save();
        Session()->put('message', 'Add successfully');
        return Redirect::to('/show-supplier');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($supplier_id)
    {
        //
        $supplier = Supplier::where('supplier_id', $supplier_id)->first();
        return view('admin.supplier.edit_supplier')->with(compact('product_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $supplier_id)
    {
        //
        $supplier = Supplier::find($supplier_id);
        $supplier->updated_at = now();
        $supplier->update($request->all());
        Session()->put('Message', 'Update successfully');
        return Redirect::to('/show-supplier');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}
