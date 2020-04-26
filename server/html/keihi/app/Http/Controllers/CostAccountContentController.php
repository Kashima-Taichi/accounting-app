<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use Illuminate\Http\Request;

class CostAccountContentController extends Controller
{
    // 選択された項目をもとに経費計上実績を抽出する model
    public function outPutAccountContent(Request $request) {
        $extractedCosts = Cost::whereRaw('accountName = ? and year = ? and month = ?', array($request->account, $request->year, $request->month))->get();
        $extractedCostAmount = Cost::whereRaw('accountName = ? and year = ? and month = ?', array($request->account, $request->year, $request->month))->sum('price');
        return view('costAccountContent.costAccountContent', 
        ['extractedYear' => $request->year, 'extractedMonth' => $request->month, 'extractedAccountName' => $request->account, 'extractedCosts' => $extractedCosts, 'extractedCostAmount' => $extractedCostAmount]);
    }
}