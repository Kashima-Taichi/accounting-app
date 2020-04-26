<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cost;
use App\Models\Salary;
use DB;

class SelectYearMonthController extends Controller
{
    // 年別月別科目別経費実績の検索を行う際の条件設定 model
    public function selectYearMonthBeforeFilter() {
        $yearSelectors = Cost::groupBy('year')->get('year');
        $monthSelectors = Cost::groupBy('month')->get('month');
        $accounts = Cost::groupBy('accountName')->get(['accountName']);
        return view('costAccountContent.selectYearMonth', ['yearSelectors' => $yearSelectors, 'monthSelectors' => $monthSelectors, 'accounts' => $accounts]);
    }

    // DBから経費計上のある年数と月数を取得して年月選択ページへ渡す model 
    public function yearMonthSelector() {
        $yearSelectors = Cost::groupBy('year')->get('year');
        $monthSelectors = Cost::groupBy('month')->get('month');
        $daySelectors = Cost::groupBy('day')->get('day');
        return view('costList.selectYearMonth', ['yearSelectors' => $yearSelectors, 'monthSelectors' => $monthSelectors, 'daySelectors' => $daySelectors]);
    }

    // DBから経費計上のある年数と月数を取得して年月選択ページへ渡す model 
    public function yearMonthSelectorForTopTen() {
        $yearSelectors = Cost::groupBy('year')->get('year');
        $monthSelectors = Cost::groupBy('month')->get('month');
        return view('costList.selectYearMonthForTop10', ['yearSelectors' => $yearSelectors, 'monthSelectors' => $monthSelectors]);
    }

    // CSVを出力させる年月を選択するページの年と月を計上実績のあるものをDBから取得 DB
    public function selectYearMonthBeforewriteCsv() {
        $yearSelectors = Cost::groupBy('year')->get('year');
        $monthSelectors = Cost::groupBy('month')->get('month');
        return view('costCsv.selectYearMonth', ['yearSelectors' => $yearSelectors, 'monthSelectors' => $monthSelectors]);   
    }

    // 選択使用の年数を取得 model 
    public function selectYearMonth() {
        $yearSelectors = Salary::groupBy('year')->get('year');
        $monthSelectors = Salary::groupBy('month')->get('month');
        return view('outputPL.selectYearMonth', ['yearSelectors' => $yearSelectors, 'monthSelectors' => $monthSelectors]);
    }

    // 選択使用の年数を取得 model 
    public function yearMonthSelectorForCostGraph() {
        $yearSelectors = Cost::groupBy('year')->get('year');
        $monthSelectors = Cost::groupBy('month')->get('month');
        return view('costGraph.selectYearMonth', ['yearSelectors' => $yearSelectors, 'monthSelectors' => $monthSelectors]);
    }
}
