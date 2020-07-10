<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary;
use App\Models\Cost;
use App\Models\Hour;
use App\Models\Account;
use DB;
use Log;

class OutputPLController extends Controller
{
    // 選択された年月に計上された経費と所得を取得してPLページに渡す model & DB
    public function referencePL(Request $request) {
            // 選択した月のPLの情報を取得
            $param = ['year' => $request->year, 'month' => $request->month];
            $costsForPL = $this->makeCostForPl($param);
            $salaryForPL = Salary::whereRaw('year = ? and month = ?', array($param['year'], $param['month']))->first();
            $hoursForPL = Hour::whereRaw('year = ? and month = ?', array($param['year'], $param['month']))->first();
        // PL複数月参照の場合
        if (strpos(url()->current(), 'referencepls') === false) {
            return view('outputPL.referencePL', ['param' => $param, 'costsForPL' => $costsForPL, 'salaryForPL' => $salaryForPL, 'hoursForPL' => $hoursForPL]);
        } else {
            // 選択した月のマイナス1の月のPLの情報を取得
            $paramMinus = ['year' => strval($request->year), 'month' => strval($request->month - 1)];
            $costsForPLMinus = $this->makeCostForPl($paramMinus);
            $salaryForPLMinus = Salary::whereRaw('year = ? and month = ?', array($paramMinus['year'], $paramMinus['month']))->first();
            $hoursForPLMinus = Hour::whereRaw('year = ? and month = ?', array($paramMinus['year'], $paramMinus['month']))->first();
            return view('outputPL.referencePLs', ['param' => $param, 'costsForPL' => $costsForPL, 'salaryForPL' => $salaryForPL, 'hoursForPL' => $hoursForPL, 'costsForPLMinus' => $costsForPLMinus, 'salaryForPLMinus' => $salaryForPLMinus, 'hoursForPLMinus' => $hoursForPLMinus]);
        }
    }

    // 四半期PLの参照
    public function referenceQuarterPLs(Request $request) {
       // データ取得対象の年月の調整
       $months = explode(',', $request->quarter);
       $start = $months[0];
       $end = $months[1];
       $param = ['year' => $request->year, 'start' => $start, 'end' => $end];

       // どの半期を取得するのかを特定
       $quarter = [
           '4' => '第1四半期',
           '7' => '第2四半期',
           '10' => '第3四半期',
           '1' => '第4四半期'
       ];
       $quarterMessage = $quarter[$start];

       // 経費・所得・時間データの取得
       $costsForPL = $this->makeCostForPl($param);
       $salaryForPL = DB::select('SELECT sum(netIncome) netIncome FROM salaries WHERE year = :year AND month BETWEEN :start AND :end', $param);
       $hoursForPL = DB::select('SELECT sum(fixedTime) fixedTime, sum(overTime) overTime FROM hours WHERE year = :year AND month BETWEEN :start AND :end', $param);

       return view('outputPL.referrencePLquarter', ['param' => $param, 'costsForPL' => $costsForPL, 'salaryForPL' => $salaryForPL, 'hoursForPL' => $hoursForPL, 'quarterMessage' => $quarterMessage]);
    }

    // PL参照用の経費データの加工
    private function makeCostForPl($param) {
        if (count($param) === 3) {
            $costData = DB::select('SELECT accountName, sum(price) accountAmount FROM costs WHERE year = :year AND month BETWEEN :start AND :end GROUP BY accountName', $param);
        } else {
            $costData = DB::select('SELECT accountName, sum(price) accountAmount FROM costs WHERE year = :year AND month = :month GROUP BY accountName', $param);
        }
        
        // 科目マスタと実績データの用意
        $costsChild = [];
        $accountMst = [];
        foreach ($costData as $costDatum) {
            $costsChild[$costDatum->accountName] = intval($costDatum->accountAmount);
            $accountMst[] = $costDatum->accountName;
        }

        // 科目マスタを1次元配列に格納
        $accounts = Account::all();
        $costsForPL = [];
        $j = 0;
        foreach ($accounts as $account) {
            $costsForPL[$j]['accountName'] = $account->accountKanji;
            $costsForPL[$j]['accountAmount'] = 0;
            $j++;
        }
        array_shift($costsForPL);

        //経費データの中の科目データが配列の中にあるのかを見て、あれば代入する
        // !== false 指定ではなく判定文のみを条件にするとなぜか食料品のみデータが入らず
        for ($k=0 ; $k < count($costsForPL) ; $k++) {
            if ((array_search($costsForPL[$k]['accountName'], $accountMst)) !== false) {
                $costsForPL[$k]['accountAmount'] = $costsChild[$costsForPL[$k]['accountName']];
            }
        }

        return $costsForPL;
    }
}