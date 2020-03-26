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
        $restaurant->date = $request_data['date'];
        $restaurant->title = $request_data['title'];
        $restaurant->content = $request_data['content'];
        //save data
        $restaurant->save();

        return redirect('/admin/restaurant');
    }
    public function update(Request $request,$id)
    {
        $request_data = $request->all();
        dd($request_data);

        $item = Restaurant::find($id);
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
