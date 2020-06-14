<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use Illuminate\Http\Request;
use Log;
use DB;
use Carbon\Carbon;

class CostListController extends Controller
{
    // 選択された年と月をもとに経費明細を参照する model
    public function getCostList(Request $request) {
        if ($request->day === 'select') {
            $costLists = Cost::whereRaw('year = ? and month = ?', array($request->year, $request->month))->get();
            $costAmounts = Cost::whereRaw('year = ? and month = ?', array($request->year, $request->month))->sum('price');
        } else {
            $costLists = Cost::whereRaw('year = ? and month = ? and day = ?', array($request->year, $request->month, $request->day))->get();
            $costAmounts = Cost::whereRaw('year = ? and month = ? and day = ?', array($request->year, $request->month, $request->day))->sum('price'); 
        }
        return view('costList.costList', 
        ['costLists' => $costLists, 'selectedYear' => $request->year, 
        'selectedMonth' => $request->month, 'selectedDay' => $request->day,
        'costAmounts' => $costAmounts]);
    }

    // 個別の経費明細を参照する model
    public function getIndividualCost($id) {
        $individualContents = Cost::find($id);
        return view('costList.costIndividual',  ['individualContents' => $individualContents]);
    }

    // 経費計上実績を削除する model
    public function costDelete($id) {
        // 削除実行後に削除したものを保存するテーブル作りを検討
        Cost::destroy($id);
        return view('costList.costDelete', ['id' => $id]);
    }

    // 経費計上実績の修正ページへ経費データを渡す model
    public function costEdit($id) {
        $record = Cost::where('id', $id)->first();
        return view('costList.costEdit', ['record' => $record]);        
    }

    // 経費計上実績の修正処理 model
    public function postEdit(Request $request) {
        $request['date'] = $request['year'] . '-' . (strlen($request['month']) === 1 ? '0' . $request['month'] : $request['month']) . '-' . (strlen($request['day']) === 1 ? '0' . $request['day'] : $request['day']);
        $this->validate($request, Cost::$rules);
        $toBeEditedData = Cost::find($request->id);
        unset($request['_token']);
        $toBeEditedData->fill($request->all())->save();
        return view('costList.costEditDone', ['editedRecord' => $toBeEditedData]);
    }

    // 計上された経費のトップ10を見る model
    public function getTopTenCosts(Request $request) {
        // DBのpriceカラムがvarcharのため、データの取得結果がおかしかった
        $topTenCosts = Cost::whereRaw('year = ? and month = ?', array($request->year, $request->month))->orderBy('price', $request->ascdesc)->take(10)->get();
        return view('costList.topTenCost', ['topTenCosts' => $topTenCosts, 'selectedYear' => $request->year, 'selectedMonth' => $request->month]);
    }

    // 経費計上カレンダーを参照する DB
    public function getCalendar(Request $request) {
        // ロケール情報の設定
        setlocale(LC_ALL, 'ja_JP.UTF-8');

        // 選択した月のデータを取得
        $param = ['year' => $request->year, 'month' => $request->month];
        $lineGraphData = DB::select('SELECT date, sum(price) dayAmount FROM costs WHERE year = :year AND month = :month GROUP BY date', $param);

        // 選択した月のデータの"date"情報をCarbonのものに書き換える
        for ($i = 0; $i < count($lineGraphData); $i++) {
            $lineGraphData[$i]->dateCarbon = new Carbon($lineGraphData[$i]->date);
        }

        // その月の日数を取得する
        $monthDays = $lineGraphData[0]->dateCarbon->daysInMonth;
        // 送信された月の初日を変数に代入
        $loopDay = $lineGraphData[0]->dateCarbon;

        // カレンダー用のデータを作成する
        $calendarData = [];

        // 送信された月の初日の曜日情報を取得
        $youbiNum = $lineGraphData[0]->dateCarbon->dayOfWeek;
        
        // 初日が日曜日ではない場合に、差分の前月の日付を取得
        if ($youbiNum !== 0) {
            $loopDay->subDays($youbiNum);
            for ($i=0; $i < $youbiNum; $i++) { 
                $calendarData[$i]['calendarData'] = $loopDay->formatLocalized('%d日');
                $calendarData[$i]['price'] = '-';
                $loopDay->addDay();
            }
        }

        // カレンダー配列に日付と金額をセットしていく
        for ($j = 0; $j < $monthDays; $j++, $i++) {
            try {
                $calendarData[$i]['calendarData'] = $loopDay->formatLocalized('%d日');
                $calendarData[$i]['price'] = number_format($lineGraphData[$j]->dayAmount) . '円';
                $loopDay->addDay();
            } catch (\Throwable $th) {
                $calendarData[$i]['price'] = '-';
                $loopDay->addDay();
            }
        }
        // データの最終日の曜日を取得 直前のループで来月の初日に戻っているので、1日引いて曜日の数値をとる
        $lastYoubiNum = $loopDay->subDay()->dayOfWeek;
        // 次のループに合わせて、日付を1日足して戻す
        $loopDay->addDay();

        // 最終日が土曜日でなければ、翌月の最初の土曜日までの日付情報を取得
        if ($youbiNum !== 6) {
            for ($k = $lastYoubiNum; $k < 6; $k++, $i++) { 
                $calendarData[$i]['calendarData'] = $loopDay->formatLocalized('%d日');
                $calendarData[$i]['price'] = '-';
                $loopDay->addDay();
            }
        }

        return view('costList.costCalendar', ['year' => $request->year, 'month' => $request->month, 'calendarData' => $calendarData]);
    }
}