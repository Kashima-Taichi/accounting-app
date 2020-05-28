<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary;
use App\Models\Cost;
use App\Models\Hour;
use DB;

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
}