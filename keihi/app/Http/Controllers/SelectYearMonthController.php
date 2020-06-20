<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cost;
use App\Models\Salary;
use DB;
use Log;

class SelectYearMonthController extends Controller
{
    // 科目別経費明細 model
    public function yearMonthSelectorForBeforeFilter() {
        $yearSelectors = Cost::groupBy('year')->get('year');
        $monthSelectors = Cost::groupBy('month')->get('month');
        $accounts = Cost::groupBy('accountName')->get(['accountName']);
        return view('selectYearMonth.selectYearMonth', 
        ['yearSelectors' => $yearSelectors, 'monthSelectors' => $monthSelectors, 'accounts' => $accounts, 
        'title' => '科目別経費計上実績の検索', 'h2' => '経費計上実績科目別抽出', 
        'action' => '/costaccountcontent/costaccountcontent', 'inputVal' => '指定した条件に基づいて経費計上実績を参照する']);
    }

    // 経費明細の参照 model 
    public function yearMonthSelectorforCostlist() {
        $yearSelectors = Cost::groupBy('year')->get('year');
        $monthSelectors = Cost::groupBy('month')->get('month');
        return view('selectYearMonth.selectYearMonth', ['yearSelectors' => $yearSelectors, 'monthSelectors' => $monthSelectors, 'title' => '経費明細の参照', 'h2' => '経費明細の参照', 'action' => '/costlist/costlist', 'inputVal' => '指定した年月の経費計上リストを出力する']);
    }

    // 経費計上実績トップ10 model 
    public function yearMonthSelectorForTopTen() {
        $yearSelectors = Cost::groupBy('year')->get('year');
        $monthSelectors = Cost::groupBy('month')->get('month');
        return view('selectYearMonth.selectYearMonth', ['yearSelectors' => $yearSelectors, 'monthSelectors' => $monthSelectors , 'title' => '経費計上金額トップ10を見る', 'h2' => '経費計上金額トップ10を見る', 
        'action' => '/costlist/toptencostslist', 'inputVal' => '指定した年月の経費計上リストを出力する']);
    }

    // CSV DB
    public function yearMonthSelectorForBeforewriteCsv() {
        $yearSelectors = Cost::groupBy('year')->get('year');
        $monthSelectors = Cost::groupBy('month')->get('month');
        return view('selectYearMonth.selectYearMonth', ['yearSelectors' => $yearSelectors, 'monthSelectors' => $monthSelectors , 'title' => '経費明細のCSV出力', 'h2' => 'CSVファイルの出力', 
        'action' => '/costcsv/writecsv', 'inputVal' => '指定した年月の経費計上データのCSVファイルを取得する']);   
    }

    // PL出力 model 
    public function yearMonthSelectorForPl() {
        $yearSelectors = Salary::groupBy('year')->get('year');
        $monthSelectors = Salary::groupBy('month')->get('month');
        return view('selectYearMonth.selectYearMonth', ['yearSelectors' => $yearSelectors, 'monthSelectors' => $monthSelectors , 'title' => '個人PLの参照', 'h2' => '年月を選択してPLを出力しよう！', 
        'action' => '/outputpl/referencepl', 'inputVal' => 'PL出力']);
    }

    // PL出力複数月 model 
    public function yearMonthSelectorForPls() {
        $yearSelectors = Salary::groupBy('year')->get('year');
        $monthSelectors = Salary::groupBy('month')->get('month');
        return view('selectYearMonth.selectYearMonth', ['yearSelectors' => $yearSelectors, 'monthSelectors' => $monthSelectors , 'title' => '個人PLの参照', 'h2' => '年月を選択してPLを出力しよう！', 
        'action' => '/outputpl/referencepls', 'inputVal' => '指定した年月から過去2ヶ月分のPL出力']);
    }

    // 円グラフ model 
    public function yearMonthSelectorForPieChart() {
        $yearSelectors = Cost::groupBy('year')->get('year');
        $monthSelectors = Cost::groupBy('month')->get('month');
        return view('selectYearMonth.selectYearMonth', ['yearSelectors' => $yearSelectors, 'monthSelectors' => $monthSelectors , 'title' => '経費計上円グラフの出力', 'h2' => '経費計上円グラフの出力', 
        'action' => '/costgraph/outputpiechart', 'inputVal' => '指定した年月の経費計上データの円グラフを出力する']);
    }

    // 単月 折れ線グラフ月内日別 model 
    public function yearMonthSelectorForLineGraphDaily() {
        $yearSelectors = Cost::groupBy('year')->get('year');
        $monthSelectors = Cost::groupBy('month')->get('month');
        return view('selectYearMonth.selectYearMonth', ['yearSelectors' => $yearSelectors, 'monthSelectors' => $monthSelectors , 'title' => '経費計上折れ線グラフの出力(単月)', 'h2' => '経費計上折れ線グラフの出力(単月)', 
        'action' => '/costgraph/outputlinegraphdailycost', 'inputVal' => '指定した年月の経費計上データの折れ線グラフを出力する(単月)']);
    }

    // 複数月 折れ線グラフ月内日別 model 
    public function yearMonthSelectorForLineGraphsDaily() {
        $yearSelectors = Cost::groupBy('year')->get('year');
        $monthSelectors = Cost::groupBy('month')->get('month');
        return view('selectYearMonth.selectYearMonth', ['yearSelectors' => $yearSelectors, 'monthSelectors' => $monthSelectors , 'title' => '経費計上折れ線グラフの出力(複数月)', 'h2' => '経費計上折れ線グラフの出力(複数月)', 
        'action' => '/costgraph/outputlinegraphdailycosts', 'inputVal' => '指定した年月の経費計上データの折れ線グラフを出力する(複数月)']);
    }

    // 折れ線グラフ月別科目別推移 model
    public function yearMonthSelectorForLineGraphMonthAccount() {
        $accounts = Cost::groupBy('accountName')->get(['accountName']);
        return view('selectYearMonth.selectYearMonth', 
        ['accounts' => $accounts, 'title' => '月別科目別の経費実績の計上推移の参照', 'h2' => '月別科目別の経費実績の計上推移の参照', 
        'action' => '/costgraph/outputlinegraphMonthAccount', 'inputVal' => '指定した条件に基づいて折れ線グラフを参照する']);
    }

    // 折れ線グラフ月別科目別推移 model
    public function yearMonthSelectorforCalender() {
        $yearSelectors = Cost::groupBy('year')->get('year');
        $monthSelectors = Cost::groupBy('month')->get('month');
        return view('selectYearMonth.selectYearMonth', ['yearSelectors' => $yearSelectors, 'monthSelectors' => $monthSelectors , 'title' => '経費計上カレンダーの出力', 'h2' => '経費計上カレンダーの出力', 
        'action' => 'getcalender', 'inputVal' => '経費計上カレンダーを出力する']);
    }

    // 折れ線グラフ日別の経費計上合計額推移 model
    public function yearMonthSelectorForLineGraphDailyAmount() {
        $yearSelectors = Cost::groupBy('year')->get('year');
        $monthSelectors = Cost::groupBy('month')->get('month');
        return view('selectYearMonth.selectYearMonth', ['yearSelectors' => $yearSelectors, 'monthSelectors' => $monthSelectors , 'title' => '日別の経費計上合計額推移の参照', 'h2' => '日別の経費計上合計額を参照する', 
        'action' => '/costgraph/outputlinegraphdailycostamount', 'inputVal' => '経費計上合計額の推移を参照する']);
    }
}
