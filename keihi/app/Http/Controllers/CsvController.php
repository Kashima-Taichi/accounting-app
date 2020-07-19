<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\Csv;
use DB;

class CsvController extends Controller {

    // CSVファイルのエクスポート
    public function csv(Request $request) {

        // ファイル名の指定
        $fileName = 'costs.csv';
        $file = Csv::createCsv($fileName);

        // ヘッダー行の指定
        Csv::write($file, ['ID', '勘定科目', '金額', '摘要', '計上年', '計上月', '計上日']);

        // 経費計上データの取得
        $param = ['year' => $request->year, 'month' => $request->month];
        $lists = DB::select('SELECT id, accountName, price, journal, year, month, day FROM costs WHERE (year = :year AND month = :month)', $param);

        // オブジェクトを配列に変換する
        foreach ($lists as $key => $val) {
            $object = $lists[$key];
            $listArrays[] = (array)$object;
        }

        // 配列に変換された経費計上データをCSVに書き込んでいく
        foreach ($listArrays as $listArray) {
            Csv::write($file, $listArray);
        }

        // CSVファイルの内容をデータに格納
        $response = file_get_contents($file);

        // ストリームに入れたら実ファイルは削除
        Csv::purge($fileName);

        // CSVファイルの出力処理
        // ステータスコード200でレスポンスを返す
        return response($response, 200)
        ->header('Content-Type', 'text/csv')
        ->header('Content-Disposition', 'attachment; filename='.$fileName);
    }
}
