<?php

namespace App\Http\Controllers;

use App\Camp;
use App\flower;
use App\Customer;
use App\Mail\test;
use Carbon\Carbon;
use App\Restaurant;
use App\Jobs\SendEmail;
use App\Mail\SendToCustomer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use SebastianBergmann\GlobalState\Restorer;

class FrontController extends Controller
{
    public function test_queue()
    {
        // 將寄送資料儲存成變數
        $details = ['email' => 'birnie1571@gmail.com'];
        // 用new job的方式建立新的job，夾帶變數並加上要delay的時間
        $emailJob = (new SendEmail($details))->delay(Carbon::now()->addMinutes(0));
        // dispatch(派送)這一job進入queue，在這裡是使用database，代表會在database中建立資料
        dispatch($emailJob);
        // SendEmail::dispatchNow($details);
        return redirect('/home');
    }
    public function testmail(Request $request)
    {
        Mail::to('birnie1571@gmail.com')->send(new test);
        return redirect('/home');
    }
    public function testmail2(Request $request)
    {
        Mail::to('birnie1571@gmail.com')->later(2,new test);
        return redirect('/home');
    }


    // 形象首頁
    public function image_home()
    {
        return view('/front/image_home');
    }
    // 首頁
    public function home()
    {
        return view('/front/home');
    }
    // 園區介紹
    public function intro()
    {
        return view('/front/intro');
    }
    // 花況
    public function flower()
    {
        $flower_datas = flower::all()->sortByDesc('date');
        return view('/front/flower',compact('flower_datas'));
    }
    // 活動
    public function activity()
    {
        return view('/front/activity');
    }
    // 預定
    public function booking()
    {
        return view('/front/booking');
    }
    // 預定紀錄
    public function booking_record()
    {
        return view('/front/booking_record');
    }
    // 交通
    public function traffic()
    {
        return view('/front/traffic');
    }
    // 螢火蟲、油桐花季
    public function firefly_season()
    {
        return view('/front/firefly_season');
    }
    // booking_form_store
    public function booking_form_store(Request $request)
    {
        $request_data = $request->all();
        $customer = new Customer;
        // customer
        $customer->name = $request_data["customer_name"];
        $customer->phone = $request_data["customer_phone"];
        $customer->email = $request_data["customer_email"];
        $customer->save();
        // camp

        if ($request_data["adult"] != null) {
            $carbon_check_in_date = Carbon::parse($request_data["check_in_date"]);
            $carbon_striking_camp_date = Carbon::parse($request_data["striking_camp_date"]);
            $camp_days = $carbon_striking_camp_date->diffInDays($carbon_check_in_date);
            if ($request_data["campsite_type"] == "Grass") {
                $one_day_price = 300;
            }
            if ($request_data["campsite_type"] == "Small Pavilion") {
                $one_day_price = 400;
            }
            if ($request_data["campsite_type"] == "Big Pavilion") {
                $one_day_price = 700;
            }
            $camp = new Camp;
            $camp->customer_id = $customer->id;
            $camp->adult = $request_data["adult"];
            if ($request_data["child"] != null) {
                $camp->child = $request_data["child"];
            } else {
                $camp->child = 0;
            }
            $camp->check_in_date = $request_data["check_in_date"];
            $camp->striking_camp_date = $request_data["striking_camp_date"];
            $camp->campsite_type = $request_data["campsite_type"];
            if ($request_data["equipment_need"] == 'on') {
                $camp->equipment_need = "Yes";
            } else {
                $camp->equipment_need = "No";
            }
            $camp->price = $one_day_price * $camp_days;
            if ($request_data["remark_camp"] != null) {
                $camp->remark = $request_data["remark_camp"];
            }
            $camp->save();
        }

        // restaurant
        if ($request_data["total_number"] != null) {
            $restaurant = new Restaurant;
            $restaurant->customer_id = $customer->id;
            $restaurant->total_number = $request_data['total_number'];
            if ($request_data['vegetarian_number'] != null) {
                $restaurant->vegetarian_number = $request_data['vegetarian_number'];
            }
            $restaurant->date = $request_data['restaurant_date'];
            $restaurant->time = $request_data['restaurant_time'];
            // 判斷時段
            $order_time = Carbon::create($request_data['restaurant_time']);
            $Breakfast_time = Carbon::create('11:00'); //1100前為早餐
            $Lunch_time = Carbon::create('15:00');  //1500前為午餐
            $comparison1 = $Lunch_time->diffInHours($order_time,false);  //後減前
            $comparison2 = $Breakfast_time->diffInHours($order_time,false);
            if ($comparison1 >= 0) {
                $restaurant->time_session = "Dinner";
            } else {
                if ($comparison2 >= 0) {
                    $restaurant->time_session = "Lunch";
                } else {
                    $restaurant->time_session = "Breakfast";
                }
            }
            $restaurant->price = 500 * $request_data['total_number'];
            if ($request_data['remark_restaurant'] != null) {
                $restaurant->remark = $request_data['remark_restaurant'];
            }
            if ($request_data["guide_need"] == 'on') {
                $restaurant->guide_need = "Yes";
            } else {
                $restaurant->guide_need = "No";
            }
            $restaurant->save();
        }

        // send mail to customer
        $passing_data_to_mail = [
            'customer'=>$customer,
            'camp'=>'',
            'restaurant'=>'',
        ];
        if ($request_data["adult"] != null) {
            $passing_data_to_mail['camp'] = $camp;
        }
        if ($request_data["total_number"] != null) {
            $passing_data_to_mail['restaurant'] = $restaurant;
        }

        Mail::to($request_data['customer_email'])->later(0,new SendToCustomer($passing_data_to_mail));
        return $request_data;
    }
}
