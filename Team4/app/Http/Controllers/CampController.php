<?php

namespace App\Http\Controllers;

use App\Camp;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CampController extends Controller
{
    public function index(Request $request)
    {
        $all_camp_datas = Camp::with('customer')->get();
        return view('admin/camp/index', compact("all_camp_datas"));
    }

    // store
    public function store(Request $request)
    {

        $request_data = $request->all();
        $validatedData = $request->validate([
            'customer_id' => 'exists:customers,id',
        ]);
        if ($request_data["campsite_type"] == "Grass") {
            $one_day_price = 300;
        }
        if ($request_data["campsite_type"] == "Small Pavilion") {
            $one_day_price = 400;
        }
        if ($request_data["campsite_type"] == "Big Pavilion") {
            $one_day_price = 2500;
        }

        $check_in_dates = explode(' - ',$request_data['camp_date']);

        $check_in_date = Carbon::parse($check_in_dates[0]);
        $striking_camp_date = Carbon::parse($check_in_dates[1]);
        $camp_days = $striking_camp_date->diffInDays($check_in_date);
        // 以new創建新資料
        $camp = new Camp;
        $camp->customer_id = $request_data['customer_id'];
        $camp->adult = $request_data['adult'];
        $camp->child = $request_data['child'];
        $camp->check_in_date = $check_in_date;
        $camp->striking_camp_date = $striking_camp_date;
        $camp->campsite_type = $request_data['campsite_type'];
        $camp->equipment_need = $request_data['equipment_need'];

        if ($request_data['equipment_need'] == "Yes") {
            $camp->price = $camp_days * $one_day_price + 1000;
        }else {
            $camp->price = $camp_days * $one_day_price;
        }
        $camp->remark = $request_data['remark'];

        //save data
        $camp->save();

        return redirect('/admin/booking/camp');
    }
    public function update(Request $request,$id)
    {
        $request_data = $request->all();
        $item = Camp::find($id);
        if ($request_data["campsite_type"] == "Grass") {
            $one_day_price = 300;
        }
        if ($request_data["campsite_type"] == "Small Pavilion") {
            $one_day_price = 400;
        }
        if ($request_data["campsite_type"] == "Big Pavilion") {
            $one_day_price = 2500;
        }

        $check_in_date = Carbon::parse($request_data["check_in_date"]);
        $striking_camp_date = Carbon::parse($request_data["striking_camp_date"]);
        $camp_days = $striking_camp_date->diffInDays($check_in_date);

        if ($request_data['equipment_need'] == "Yes") {
            $item->price = $camp_days * $one_day_price + 1000;
        }else {
            $item->price = $camp_days * $one_day_price;
        }

        $item->update($request_data);
        return redirect('admin/booking/camp');
    }
    // delete
    public function delete($id)
    {
        $item = Camp::find($id);
        $item->delete();
        return ;
    }
}
