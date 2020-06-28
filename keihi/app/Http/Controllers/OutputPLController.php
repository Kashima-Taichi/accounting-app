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
        $param = ['year' => $request->year, 'month' => $request->month];
        $costsForPL = $this->makeCostForPl($param['year'], $param['month']);
        $salaryForPL = Salary::whereRaw('year = ? and month = ?', array($param['year'], $param['month']))->first();
        $hoursForPL = Hour::whereRaw('year = ? and month = ?', array($param['year'], $param['month']))->first();
        return view('outputPL.referencePL', ['param' => $param, 'costsForPL' => $costsForPL, 'salaryForPL' => $salaryForPL, 'hoursForPL' => $hoursForPL]);
    }

    // 選択された年月に計上された経費と所得を取得してPLページに渡す model & DB
    public function referencePLs(Request $request) {
        $param = ['year' => $request->year, 'month' => $request->month];
        $paramMinus = ['year' => strval($request->year), 'month' => strval($request->month - 1)];
        // 選択した月のPLの情報を取得
        $costsForPL = $this->makeCostForPl($param['year'], $param['month']);
        $salaryForPL = Salary::whereRaw('year = ? and month = ?', array($param['year'], $param['month']))->first();
        $hoursForPL = Hour::whereRaw('year = ? and month = ?', array($param['year'], $param['month']))->first();
        // 選択した月のマイナス1の月のPLの情報を取得
        $costsForPLMinus = $this->makeCostForPl($paramMinus['year'], $paramMinus['month']);
        $salaryForPLMinus = Salary::whereRaw('year = ? and month = ?', array($paramMinus['year'], $paramMinus['month']))->first();
        $hoursForPLMinus = Hour::whereRaw('year = ? and month = ?', array($paramMinus['year'], $paramMinus['month']))->first();
        return view('outputPL.referencePLs', ['param' => $param, 'costsForPL' => $costsForPL, 'salaryForPL' => $salaryForPL, 'hoursForPL' => $hoursForPL, 'costsForPLMinus' => $costsForPLMinus, 'salaryForPLMinus' => $salaryForPLMinus, 'hoursForPLMinus' => $hoursForPLMinus]);
    }

    public function makeCostForPl($year, $month) {
        $param = ['year' => $year, 'month' => $month];
        $costData = DB::select('SELECT accountName, sum(price) accountAmount FROM costs WHERE year = :year AND month = :month GROUP BY accountName', $param);

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