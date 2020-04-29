<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use Illuminate\Http\Request;

class CostRecordController extends Controller {
    public function postCost(Request $request) {
        // バリデーション
        $this->validate($request, Cost::$rules);
        // 経費データの登録
        $costs = new Cost;
        $costData = $request->all();
        unset($costData['_token']);
        $costs->fill($costData)->save();
        return view('costRec.costRec', 
        ['msg'=>'正しく経費の入力が行われました！続けて経費の計上を行うことが可能です。', 'reuseYear' => $request->year, 'reuseMonth' => $request->month, 'reuseDay' => $request->day]);
    }
}
