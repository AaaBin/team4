<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        $all_restaurant_datas = Restaurant::with('customer')->get();
        return view('admin/restaurant/index', compact("all_restaurant_datas"));
    }

    // store
    public function store(Request $request)
    {
        $request_data = $request->all();
        // 以new創建新資料
        $restaurant = new Restaurant;
        $restaurant->customer_id = $request_data['customer_id'];
        $restaurant->total_number = $request_data['total_number'];
        $restaurant->vegetarian_number = $request_data['vegetarian_number'];
        $restaurant->date = $request_data['date'];
        $restaurant->time = $request_data['time'];
        $restaurant->time_session = $request_data['time_session'];
        $restaurant->price = 500 * $request_data['total_number'];
        $restaurant->remark = $request_data['remark'];
        $restaurant->customer_id = $request_data['customer_id'];
        //save data
        $restaurant->save();

        return redirect('/admin/booking/restaurant');
    }
    public function update(Request $request,$id)
    {
        $request_data = $request->all();
        $item = Restaurant::find($id);
        $item->price = 500 * $request_data['total_number'];
        $item->update($request_data);
        return redirect('admin/booking/restaurant');
    }
    // delete
    public function delete($id)
    {
        $item = Restaurant::find($id);
        $item->delete();
        return ;
    }
}
