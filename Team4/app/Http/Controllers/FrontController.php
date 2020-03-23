<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
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
        return view('/front/flower');
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
