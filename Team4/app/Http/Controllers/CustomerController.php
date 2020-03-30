<?php

namespace App\Http\Controllers;

use App\Camp;
use App\Customer;
use App\Restaurant;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $all_customer_datas = Customer::with('camp')->with('restaurant')->get();
        return view('admin/customer/index', compact("all_customer_datas"));
    }

    // store
    public function store(Request $request)
    {
        $request_data = $request->all();
        Customer::create($request_data);

        return redirect('/admin/customer');
    }

    // update
    public function update(Request $request,$id)
    {
        $request_data = $request->all();
        $item = Customer::find($id);
        $item->update($request_data);
        return redirect('admin/customer');
    }

    // delete
    public function delete($id)
    {
        $customer = Customer::find($id);
        $camps = Camp::where('customer_id',$customer->id)->get();
        foreach ($camps as $camp) {
            $camp->delete();
        }
        $restaurants = Restaurant::where('customer_id',$customer->id)->get();
        foreach ($restaurants as $restaurant) {
            $restaurant->delete();
        }
        $customer->delete();
        return ;
    }
}
