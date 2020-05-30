<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary;
use App\Models\Cost;
use App\Models\Hour;
use DB;
use Log;

class OutputPLController extends Controller
{
    // 選択された年月に計上された経費と所得を取得してPLページに渡す model & DB
    public function referencePL(Request $request) {
        $param = ['year' => $request->year, 'month' => $request->month];
        $costsForPL = DB::select('SELECT accountName, sum(price) accountAmount FROM costs WHERE year = :year AND month = :month GROUP BY accountName', $param);
        $salaryForPL = Salary::whereRaw('year = ? and month = ?', array($param['year'], $param['month']))->first();
        $hoursForPL = Hour::whereRaw('year = ? and month = ?', array($param['year'], $param['month']))->first();
        return view('outputPL.referencePL', ['param' => $param, 'costsForPL' => $costsForPL, 'salaryForPL' => $salaryForPL, 'hoursForPL' => $hoursForPL]);
    }

    // 選択された年月に計上された経費と所得を取得してPLページに渡す model & DB
    public function referencePLs(Request $request) {
        $param = ['year' => $request->year, 'month' => $request->month];
        $paramMinus = ['year' => strval($request->year), 'month' => strval($request->month - 1)];
        // 選択した月のPLの情報を取得
        $costsForPL = DB::select('SELECT accountName, sum(price) accountAmount FROM costs WHERE year = :year AND month = :month GROUP BY accountName', $param);
        $salaryForPL = Salary::whereRaw('year = ? and month = ?', array($param['year'], $param['month']))->first();
        $hoursForPL = Hour::whereRaw('year = ? and month = ?', array($param['year'], $param['month']))->first();
        // 選択した月のマイナス1の月のPLの情報を取得
        $costsForPLMinus = DB::select('SELECT accountName, sum(price) accountAmount FROM costs WHERE year = :year AND month = :month GROUP BY accountName', $paramMinus);
        $salaryForPLMinus = Salary::whereRaw('year = ? and month = ?', array($paramMinus['year'], $paramMinus['month']))->first();
        $hoursForPLMinus = Hour::whereRaw('year = ? and month = ?', array($paramMinus['year'], $paramMinus['month']))->first();
        return view('outputPL.referencePLs', ['param' => $param, 'costsForPL' => $costsForPL, 'salaryForPL' => $salaryForPL, 'hoursForPL' => $hoursForPL, 'costsForPLMinus' => $costsForPLMinus, 'salaryForPLMinus' => $salaryForPLMinus, 'hoursForPLMinus' => $hoursForPLMinus]);
    }
}