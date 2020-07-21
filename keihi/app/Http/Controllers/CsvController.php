<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Traits\Csv;
use DB;
use Log;

class CsvController extends Controller {

    // CSVファイルのエクスポート
    public function CostCsv(Request $request) {

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

    public function plCsv(Request $request) {

        // 前準備
        $fileName = 'pl.csv';
        $file = Csv::createCsv($fileName);
        Csv::write($file, ['項目', '金額']);
        Csv::write($file, []);
        Csv::write($file, ['＜給与項目＞', '＜金額＞']);
        $param = ['year' => $request->year, 'month' => $request->month];

        // 所得データの取得と書き込み
        $incomeData = DB::select('SELECT netIncome FROM salaries WHERE (year = :year AND month = :month)', $param);
        $incomeCsv[] = ['手取り給与', $incomeData[0]->netIncome];
        foreach ($incomeCsv as $key => $value) {
            Csv::write($file, $value);
        }
        Csv::write($file, []);

        // 経費データの取得と書き込み
        Csv::write($file, ['＜経費科目＞', '＜金額＞']);
        $costDbData = DB::select('SELECT accountName, sum(price) FROM costs WHERE (year = :year AND month = :month) group by accountName', $param);
        foreach ($costDbData as $key => $value) {
            $costObject = $costDbData[$key];
            $costArray[] = (array)$costObject;
        }
        foreach ($costArray as $key => $value) {
            Csv::write($file, $value);
        }
        Csv::write($file, []);

        // 稼働時間データの取得と書き込み
        Csv::write($file, ['＜時間項目＞', '＜時間＞']);
        $hoursDbData = DB::select('SELECT fixedTime, overTime FROM hours WHERE (year = :year AND month = :month)', $param);
        $hourArray = [];
        foreach ($hoursDbData as $key => $value) {
            $hourObject = $hoursDbData[$key];
            $hourArray = (array)$hourObject;
        }
        $hourArray['totalTime'] = $hourArray['fixedTime'] + $hourArray['overTime'];
        $hourText = [
            'fixedTime' => '定時間',
            'overTime' => '残業時間',
            'totalTime' => '総時間'
        ];
        $plHourData = [];
        $cnt = 0;
        foreach ($hourArray as $key => $value) {
            $plHourData[$cnt]['hourText'] = $hourText[$key];
            $plHourData[$cnt]['hourNum'] = $hourArray[$key];
            $cnt++;
        }
        foreach ($plHourData as $key => $value) {
            Csv::write($file, $value);
        }

        // CSVファイルの出力とレスポンス
        $response = file_get_contents($file);
        Csv::purge($fileName);
        return response($response, 200)
        ->header('Content-Type', 'text/csv')
        ->header('Content-Disposition', 'attachment; filename='.$fileName);
    }
}
