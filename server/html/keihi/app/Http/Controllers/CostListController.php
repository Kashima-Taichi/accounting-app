<?php

namespace App\Http\Controllers;

use App\Models\Cost;
use Illuminate\Http\Request;
use Log;

class CostListController extends Controller
{

    // 選択された年と月をもとに経費明細を参照する model
    public function getCostList(Request $request) {
        if ($request->day === 'select') {
            $costLists = Cost::whereRaw('year = ? and month = ?', array($request->year, $request->month))->get();
            $costAmounts = Cost::whereRaw('year = ? and month = ?', array($request->year, $request->month))->sum('price');
        } else {
            $costLists = Cost::whereRaw('year = ? and month = ? and day = ?', array($request->year, $request->month, $request->day))->get();
            $costAmounts = Cost::whereRaw('year = ? and month = ? and day = ?', array($request->year, $request->month, $request->day))->sum('price'); 
        }
        return view('costList.costList', 
        ['costLists' => $costLists, 'selectedYear' => $request->year, 
        'selectedMonth' => $request->month, 'selectedDay' => $request->day,
        'costAmounts' => $costAmounts]);
    }

    // 個別の経費明細を参照する model
    public function getIndividualCost($id) {
        $individualContents = Cost::find($id);
        return view('costList.costIndividual',  ['individualContents' => $individualContents]);
    }

    // 経費計上実績を削除する model
    public function costDelete($id) {
        // 削除実行後に削除したものを保存するテーブル作りを検討
        $toBeDeletedData = Cost::find($id);
        Cost::destroy($id);
        return view('costList.costDelete', ['id' => $id]);
    }

    // 経費計上実績の修正ページへ経費データを渡す model
    public function costEdit($id) {
        $record = Cost::where('id', $id)->first();
        return view('costList.costEdit', ['record' => $record]);        
    }

    // 経費計上実績の修正処理 model
    public function postEdit(Request $request) {
        $this->validate($request, Cost::$rules);
        $toBeEditedData = Cost::find($request->id);
        $requestData = $request->all();
        unset($requestData['_token']);
        $toBeEditedData->fill($requestData)->save();
        return view('costList.costEditDone', ['editedRecord' => $toBeEditedData]);
    }

    // 登録された全ての経費実績の参照機能 model
    public function costspaginate() {
        $costsPaginated = Cost::paginate(10);
        return view('costList.costPaginate', ['costs' => $costsPaginated]);
    }

    // 計上された経費のトップ10を見る model
    public function getTopTenCosts(Request $request) {
        // DBのpriceカラムがvarcharのため、データの取得結果がおかしかった
        $topTenCosts = Cost::whereRaw('year = ? and month = ?', array($request->year, $request->month))->orderBy('price', $request->ascdesc)->take(10)->get();
        return view('costList.topTenCost', ['topTenCosts' => $topTenCosts, 'selectedYear' => $request->year, 'selectedMonth' => $request->month]);
    }
}