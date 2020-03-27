<?php

namespace App\Http\Controllers;

use App\Customer;
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
        // 以new創建新資料
        $customer = new Customer;
        $customer->date = $request_data['date'];
        $customer->title = $request_data['title'];
        $customer->content = $request_data['content'];
        //save data
        $customer->save();

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
        $item = Customer::find($id);
        $item->delete();
        return ;
    }
}
