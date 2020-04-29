<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cost;
use App\Models\Salary;
use DB;
use Log;

class SelectYearMonthController extends Controller
{
    // 年別月別科目別経費実績の検索を行う際の条件設定 model
    public function selectYearMonthBeforeFilter() {
        $yearSelectors = Cost::groupBy('year')->get('year');
        $monthSelectors = Cost::groupBy('month')->get('month');
        $accounts = Cost::groupBy('accountName')->get(['accountName']);
        return view('selectYearMonth.selectYearMonth', 
        ['yearSelectors' => $yearSelectors, 'monthSelectors' => $monthSelectors, 'accounts' => $accounts, 
        'title' => '科目別経費計上実績の検索', 'h2' => '経費計上実績科目別抽出', 
        'action' => '/costaccountcontent/costaccountcontent', 'inputVal' => '指定した条件に基づいて経費計上実績を参照する']);
    }

    // DBから経費計上のある年数と月数を取得して年月選択ページへ渡す model 
    public function yearMonthSelector() {
        $yearSelectors = Cost::groupBy('year')->get('year');
        $monthSelectors = Cost::groupBy('month')->get('month');
        return view('selectYearMonth.selectYearMonth', ['yearSelectors' => $yearSelectors, 'monthSelectors' => $monthSelectors, 'title' => '経費明細の参照', 'h2' => '経費明細の参照', 'action' => '/costlist/costlist', 'inputVal' => '指定した年月の経費計上リストを出力する']);
    }

    // DBから経費計上のある年数と月数を取得して年月選択ページへ渡す model 
    public function yearMonthSelectorForTopTen() {
        $yearSelectors = Cost::groupBy('year')->get('year');
        $monthSelectors = Cost::groupBy('month')->get('month');
        return view('selectYearMonth.selectYearMonth', ['yearSelectors' => $yearSelectors, 'monthSelectors' => $monthSelectors , 'title' => '経費計上金額トップ10を見る', 'h2' => '経費計上金額トップ10を見る', 
        'action' => '/costlist/toptencostslist', 'inputVal' => '指定した年月の経費計上リストを出力する']);
    }

    // CSVを出力させる年月を選択するページの年と月を計上実績のあるものをDBから取得 DB
    public function selectYearMonthBeforewriteCsv() {
        $yearSelectors = Cost::groupBy('year')->get('year');
        $monthSelectors = Cost::groupBy('month')->get('month');
        return view('selectYearMonth.selectYearMonth', ['yearSelectors' => $yearSelectors, 'monthSelectors' => $monthSelectors , 'title' => '経費明細のCSV出力', 'h2' => 'CSVファイルの出力', 
        'action' => '/costcsv/writecsv', 'inputVal' => '指定した年月の経費計上データのCSVファイルを取得する']);   
    }

    // 選択使用の年数を取得 model 
    public function selectYearMonth() {
        $yearSelectors = Salary::groupBy('year')->get('year');
        $monthSelectors = Salary::groupBy('month')->get('month');
        return view('selectYearMonth.selectYearMonth', ['yearSelectors' => $yearSelectors, 'monthSelectors' => $monthSelectors , 'title' => '個人PLの参照', 'h2' => '年月を選択してPLを出力しよう！', 
        'action' => '/outputpl/referencepl', 'inputVal' => 'PL出力']);
    }

    // 選択使用の年数を取得 model 
    public function yearMonthSelectorForCostGraph() {
        $yearSelectors = Cost::groupBy('year')->get('year');
        $monthSelectors = Cost::groupBy('month')->get('month');
        return view('selectYearMonth.selectYearMonth', ['yearSelectors' => $yearSelectors, 'monthSelectors' => $monthSelectors , 'title' => '経費計上円グラフの出力', 'h2' => '経費計上円グラフの出力', 
        'action' => '/costgraph/outputpiechart', 'inputVal' => '指定した年月の経費計上データの円グラフを出力する']);
    }
}
