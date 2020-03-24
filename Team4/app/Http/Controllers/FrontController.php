<?php

namespace App\Http\Controllers;

use App\flower;
use Carbon\Carbon;
use App\Jobs\SendEmail;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function test_queue()
    {
        // 將寄送資料儲存成變數
        $details = ['email' => 'birnie1571@gmail.com'];
        // 用new job的方式建立新的job，夾帶變數並加上要delay的時間
        $emailJob = (new SendEmail($details))->delay(Carbon::now()->addMinutes(60));
        // dispatch(派送)這一job進入queue，在這裡是使用database，代表會在database中建立資料
        dispatch($emailJob);
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
        return view('/front/index');
    }
    // 園區介紹
    public function intro()
    {
        return view('/front/intro');
    }
    // 花況
    public function flower()
    {
        $flower_datas = flower::all()->sortByDesc('date_d')->sortByDesc('date_m')->sortByDesc('date_y');
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
}
