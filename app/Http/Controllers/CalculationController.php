<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Models\Calculation;
use Illuminate\Http\Request;

class CalculationController extends Controller
{

    public function show_all(Request $request)
    {

        AuthLogin();
        $key = $request->keyword_submit;
        $all_calculation = Calculation::paginate(4);
        if ($key = $request->keyword_submit) {
            $all_calculation = Calculation::where('calculation_name', 'like', '%' . $key . '%')->paginate(4);
        }


        return view('admin.calculation.all')->with(compact('all_calculation'));
    }
    public function add_calculation()
    {
        AuthLogin();
        return view('admin.calculation.add');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $calculation = new Calculation;
        $calculation->calculation_name = $data['calculation_name'];
        $calculation->created_at = now();
        $check = Calculation::where('calculation_name', $data['calculation_name'])->first();
        if ($check) {
            session()->flash('warrning', 'Đơn vị tính đã tồn tại!');
            return Redirect::back();
        } else {
            $calculation->save();
            Session()->put('message', 'Thêm đơn vị tính thành công!');
            return Redirect::to('/show-calculation');
        }
    }

    public function edit($calculation_id)
    {
        $calculation = Calculation::where('calculation_id', $calculation_id)->first();
        return view('admin.calculation.edit')->with(compact('calculation'));
    }
    public function update(Request $request, $calculation_id)
    {
        $calculation = Calculation::find($calculation_id);
        $calculation->updated_at = now();
        $calculation->update($request->all());
        Session()->put('message', 'Cập nhật đơn vị tính thành công!');
        return Redirect::to('/show-calculation');
    }

    public function destroy($calculation_id)
    {
        $calculation = Calculation::find($calculation_id);
        $calculation->delete();
        Session()->put('error', 'Xóa đơn vị tính thành công!');
        return Redirect::to('/show-calculation');
    }
}
