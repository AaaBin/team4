<?php

namespace App\Http\Controllers;

use App\Imagehome;
use Illuminate\Http\Request;

class ImageHomeController extends Controller
{
    public function index(Request $request)
    {
        $all_imagehome_datas = Imagehome::all();
        return view('admin/image_home/index', compact("all_imagehome_datas"));
    }



    // sort buttom in index page
    public function sort_down(Request $request)
    {
        // 依照ajax送進來的資料，抓到正在動作的是哪一筆資料(主資料)
        $item = Imagehome::find($request->data_id);
        // 抓到主資料的目前sort值
        $sort_value = $item->sort;
        // 排序後以first抓到第一筆，存成變數(目標資料)
        $target = Imagehome::where('sort','<',$sort_value)->orderby('sort','desc')->first();

        if ($target == null) {
            // 進行判斷，如果目標資料不存在，代表主資料的sort值已經是最小
            // 第二個判斷，如果sort值大於0，則讓sort值減1，並變更進資料庫
            if($sort_value > 0){
            $item->sort = $sort_value - 1;
            }
            // 建立一個新變數，值是主資料的sort值減1，作為傳回頁面的資料
            $sort_value_new = $sort_value - 1;
            // 建立要回傳的資料，也就是原先值-1之後的數值
            $result = [$sort_value_new];

        }else{
            // 目標資料如果存在，就可以將主資料的sort值與目標資料的sort值互換
            // 將目標資料的值建立成變數
            $target_sort_value = $target->sort;
            // 主資料的值改成目標資料的值
            $item->sort = $target_sort_value;
            // 目標資料的值改成主資料的值
            $target->sort = $sort_value;
            // 將目標資料的變更更新進資料庫
            $target->update();
            // 建立新變數表示新的索引值，
            $sort_value_new = $sort_value;
            $target_id = $target->id;
            $result = [$target_sort_value,$sort_value_new,$target_id];

        }
        $item->update();
        return $result;
    }


    public function sort_up(Request $request)
    {
        // 依照ajax送進來的資料，抓到正在動作的是哪一筆資料(主資料)
        $item = Imagehome::find($request->data_id);
        // 抓到主資料的目前sort值
        $sort_value = $item->sort;
        $target = Imagehome::where('sort','>',$sort_value)->orderby('sort','asc')->first();
        // 先建立對象資料更改後的sort值，也就是主資料的sort值

        if ($target == null) {
            // 進行判斷，如果目標資料不存在，代表主資料的sort值已經是最大
            $item->sort = $sort_value + 1;

            // 建立一個新變數，值是主資料的sort值減1，作為傳回頁面的資料
            $sort_value_new = $sort_value + 1;
            // 建立要回傳的資料，也就是原先值+1之後的數值
            $result = [$sort_value_new];

        }else{
            // 目標資料如果存在，就可以將主資料的sort值與目標資料的sort值
            $target_sort_value = $target->sort;
            $item->sort = $target_sort_value;
            $target->sort = $sort_value;
            $target->update();
            $sort_value_new = $sort_value;
            $target_id = $target->id;
            $result = [$target_sort_value,$sort_value_new,$target_id];

        }
        $item->update();
        return $result;
    }

    // store
    public function store(Request $request)
    {
        $request_data = $request->all();
        Imagehome::create($request_data);
        return redirect('/admin/image_home');
    }
    public function update(Request $request,$id)
    {
        $request_data = $request->all();
        $item = Imagehome::find($id);
        $item->update($request_data);
        return redirect('admin/image_home');
    }
    // delete
    public function delete($id)
    {
        $item = Imagehome::find($id);
        $item->delete();
        return ;
    }
}
