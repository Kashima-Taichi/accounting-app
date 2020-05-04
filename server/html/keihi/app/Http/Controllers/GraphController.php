<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cost;
use App\Models\Salary;
use DB;
use Log;
// 多次元配列のソート参考：https://qiita.com/shy_azusa/items/54dadc55e3e71cde1445

class GraphController extends Controller
{
    // 科目別に計上された経費のデータを抽出する DB
    public function createPiechart(Request $request) {
        $param = ['year' => $request->year, 'month' => $request->month];
        $piechartData = DB::select('SELECT accountName, sum(price) accountAmount FROM costs WHERE year = :year AND month = :month GROUP BY accountName', $param);
        foreach ((array) $piechartData as $key => $value) {
            $sort[$key] = $value->accountAmount;
        }
        array_multisort($sort, SORT_DESC, $piechartData);
        return view('costGraph.refPiechart', ['piechartData' => $piechartData, 'param' => $param]);
    }

    // 科目別に計上された経費のデータを抽出する DB
    public function createLineGraph(Request $request) {
        $param = ['year' => $request->year, 'month' => $request->month];
        $lineGraphData = DB::select('SELECT day, sum(price) dayAmount FROM costs WHERE year = :year AND month = :month GROUP BY day', $param);
        return view('costGraph.refLinegraph', ['lineGraphData' => $lineGraphData, 'param' => $param]);
    }

    // 科目別に計上された経費のデータを抽出する DB
    public function createLineGraphAccountMonth(Request $request) {
        $param = $request->account;
        $lineGraphData = DB::select('SELECT sum(price) as amount, concat(year, "/", month) as yearMonth FROM costs WHERE accountName = ? GROUP BY year, month', [$param]);
        return view('costGraph.refLinegraphMonthAccount', ['lineGraphData' => $lineGraphData, 'param' => $param]);
    }

    // 計上されて所得(手取り金額)を全て取得
    public function createLineGraphIncome() {
        $incomeData = DB::select('SELECT * FROM salaries');
        foreach ((array) $incomeData as $key => $value) {
            $sort[$key] = $value->yearMonth;
        }
        array_multisort($sort, SORT_ASC, $incomeData);
        return view('incomeGraph.refLineIncomeGraph', ['incomeData' => $incomeData]);
    }
}