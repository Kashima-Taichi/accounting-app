<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use Illuminate\Http\Request;
use Log;

class CostRecordController extends Controller {
    public function postCost(Request $request) {
        $request['date'] = $request['year'] . '-' . (strlen($request['month']) === 1 ? '0' . $request['month'] : $request['month']) . '-' . (strlen($request['day']) === 1 ? '0' . $request['day'] : $request['day']);
        // バリデーション
        $this->validate($request, Cost::$rules);
        // 経費データの登録
        $costs = new Cost;
        unset($request['_token']);
        $costs->fill($request->all())->save();
        return view('costRec.costRec', 
        ['msg'=>'正しく経費の入力が行われました！続けて経費の計上を行うことが可能です。', 'reuseYear' => $request->year, 'reuseMonth' => $request->month, 'reuseDay' => $request->day]);
    }
}
