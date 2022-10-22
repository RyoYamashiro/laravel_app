<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CsvController extends Controller
{
    public function index()
    {
        
        return view('csv.index');
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
        return view('csv.showCsv', compact('file'));
        // redirect()->route('showCsv', compact('data'));
    }
    public function showCsv()
    {
        return view('csv.showCsv');
    }


}
