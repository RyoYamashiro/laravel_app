<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\MyClasses\MyService;

class HelloController extends Controller
{
    public function index()
    {
        
        return view('hello.index');
    }
    public function importCsv(Request $request){
        // アップロードファイルのファイルパスを取得
        $file_path = $request->file('csv')->path();
        // CSV取得
        $file = new \SplFileObject($file_path);
        $file->setFlags(
            \SplFileObject::READ_CSV | // CSVとして行を読み込み
            \SplFileObject::READ_AHEAD | // 先読み／巻き戻しで読み込み
            \SplFileObject::SKIP_EMPTY |  // 空行を読み飛ばす
            \SplFileObject::DROP_NEW_LINE // 行末の改行を読み飛ばす
        );
        // 一行ずつ処理
        foreach($file as $line)
        {
            $data = [
                'id'     => $line[0],
                'name'   => $line[1],
                'sex'    => $line[2],
                'message'=> $line[3],
            ];
        }
        
        return view('hello.showCsv', compact('data'));
    }


    public function other(Request $request)
    {
       $data = [
        'name' => 'Taro',
        'mail' => 'taro@yamada',
        'tel' => '090-999-999',
       ];
       $query_str = http_build_query($data);
       $data['msg'] = $query_str;
       return redirect()->route('hello', $data);
    }

    public function baby(Request $request)
    {
        $data = [
            'msg' => $request->bye. ' そして '. $request->hello,
        ];
        return view('hello.index', $data);
    }

}
