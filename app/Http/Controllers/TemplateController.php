<?php

namespace App\Http\Controllers;

// 範例model
use App\EXs;
use App\EXs_sub;


use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $all_ex_data = EXs::all();
        return view('', compact("all_ex_data"));
    }
    public function create()
    {
        return view('');
    }

    public function store(Request $request)   //多檔案上傳
    {
        $request_data = $request->all();
        $file_path = $request->file("url")->store('path','public');
        $request_data['url'] = $file_path;
        $EXs_data = EXs::create($request_data);
        if($request->hasFile('sub_img')){
            // !!!注意!!!  input在上傳多比檔案時送來的資料型態會是陣列
            foreach ($request->sub_img as  $sub_img) {
                $sub_file_path = $sub_img->store('news','public');
                $foreign_key = $EXs_data->id;
                $EXs_sub_img = new EXs;
                $EXs_sub_img->img_url = $sub_file_path;
                $EXs_sub_img->EXs_id = $foreign_key;
                $EXs_sub_img->save();
            }
        }
        return redirect('');
    }



    public function edit($id)
    {
        $EXs_data = EXs::find($id);
        $EXs_sub_img = EXs_sub::find($id)->'relationship'->sortByDesc("sort");

        return view('',compact('EXs_data','EXs_sub_img'));
    }

    public function update(Request $request,$id)
    {
        $request_data = $request->all();
        $item = EXs::find($id);

        // 刪除舊圖、上傳新圖:
        if($request->hasFile('url')){
            $old_img = $item->url;

            Storage::disk('public')->delete($old_img);

            $new_img = $request->file('url')->store('','public');
            $request_data["url"] = $new_img;
        }

        // 上傳新副圖片(sub_img):
        if($request->hasFile('sub_img')){ //判斷是否有新增副圖片上傳

            foreach ($request->sub_img as $sub_img) {
                $sub_img_path = $sub_img->store('',"public");   //儲存檔案，並將名稱設為變數
                $EXs_sub_img = new EXs_sub;
                $EXs_sub_img->news_id = $id;
                $EXs_sub_img->img_url = $sub_img_path;
                $EXs_sub_img->save();
            }
        }

        $item->update($request_data);
        return redirect('');
    }

    public function delete($id)
    {
        $item = EXs::find($id);
        Storage::disk('public')->delete("$item->url");
        $item->delete();

        $sub_imgs = EXs_sub::where('EXs_id',$id)->get();
        foreach($sub_imgs as $sub_img){
            Storage::disk('public')->delete("$sub_img->img_url");
            $sub_img->delete();
        }
        return redirect("");
    }

    public function sort_down(Request $request)
    {
        // 依照ajax送進來的資料，抓到正在動作的是哪一筆資料(主資料)
        $item = EXs::find($request->data_id);
        // 抓到主資料的目前sort值
        $sort_value = $item->sort;
        // 排序後以first抓到第一筆，存成變數(目標資料)
        $target = EXs::where('sort','<',$sort_value)->orderby('sort','desc')->first();

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
        $item = EXs::find($request->data_id);
        // 抓到主資料的目前sort值
        $sort_value = $item->sort;
        $target = EXs::where('sort','>',$sort_value)->orderby('sort','asc')->first();
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



    // edit page中的ajax
    public function delete_sub_img(Request $request)
    {
        $id = $request->sub_img_id;
        $sub_img = EXs_sub::find($id)->first();
        Storage::disk('public')->delete($sub_img->img_url);  //用Storage刪除
        $sub_img->delete();

        return $id;
    }

    public function change_sub_img_sort(Request $request)
    {
        $sub_img_id = $request->sub_img_id;
        $changed_value = $request->changed_value;
        $item = EXs_sub::find($sub_img_id);
        $item->sort = $changed_value;
        $item->update();
        return $item;
    }
}
