<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
* アプリケーションのトップページへのルーティング
*/

Route::get('/', function () {
    return view('top');
});


/*
* 各区分のトップページへのルーティング
*/

// 経費関係のメニューへ飛ばす
Route::get('/tops/costtop', function () {
    return view('tops/costTop');
});

// 時間関係のメニューへ飛ばす
Route::get('/tops/hourtop', function () {
    return view('tops/hourTop');
});

// 所得関係のメニューへ飛ばす
Route::get('/tops/incometop', function () {
    return view('tops/incomeTop');
});

// グラフ参照関係のメニューへ飛ばす
Route::get('/tops/graphTop', function () {
    return view('tops/graphTop');
});

// 特殊機能のメニューへ飛ばす
Route::get('/tops/specialtop', function () {
    return view('tops/specialTop');
});

// 科目設定関係のメニューへ遷移させる
Route::get('/tops/accountstop', function () {
    return view('tops/accountstop');
});


/*
* 経費計上関係のルーティング
*/

// 経費計上のページへ遷移する
Route::get('/costrec/costrec', function () {
    return view('costRec/costRec');
});

// 経費計上を完了させる
Route::post('/costrec/costrec', 'CostRecordController@postCost');


/*
* 経費明細参照関係のルーティング
*/

// 年月選択ページで年月を選択後に、経費明細の参照にて明細を参照する
Route::post('/costlist/costlist', 'CostListController@getCostList');

// 経費明細から個別の経費明細へルーティング
Route::get('/costlist/costindividual/{id}', 'CostListController@getIndividualCost');

// 個別の経費明細から削除ページへルーティング
Route::get('/costlist/costdelete/{id}', 'CostListController@costDelete');

// 個別の経費明細から修正ページへルーティング
Route::get('/costlist/costedit/{id}', 'CostListController@costEdit');

// 修正ページから修正内容をDBに送って修正ページへ再帰
Route::post('/costlist/costeditdone', 'CostListController@postEdit');

// 計上された経費のトップ10位を見る
Route::post('/costlist/toptencostslist', 'CostListController@getTopTenCosts');


/*
* CSV出力関係のルーティング
*/

// 年月選択ページで年月を選択後に、CSVファイルの書き込みを実行する
Route::post('/costcsv/writecsv', 'DemoController@csv');

/*
* グラフ出力関係のルーティング
*/

// 年月選択後に円グラフを出力する
Route::post('/costgraph/outputpiechart', 'GraphController@createPiechart');

// 年月選択後に折れ線グラフを出力する
Route::post('/costgraph/outputlinegraphdailycost', 'GraphController@createLineGraph');

// 年月選択後に折れ線グラフを出力する
Route::post('/costgraph/outputlinegraphdailycosts', 'GraphController@createLineGraphs');

// 勘定科目選択後に折れ線グラフを出力する
Route::post('/costgraph/outputlinegraphMonthAccount', 'GraphController@createLineGraphAccountMonth');

// 所得の計上推移を出力する
Route::get('incomegraph', 'GraphController@createLineGraphIncome');

// 稼働時間の計上推移を出力する
Route::get('hoursgraph', 'GraphController@createLineGraphHours');

/*
* 年別月別科目別経費明細のルーティング
*/

// 科目別の経費明細の内容を出力
Route::post('/costaccountcontent/costaccountcontent', 'CostAccountContentController@outPutAccountContent');


/*
* 収入登録関係のルーティング
*/

// 所得計上のページへ遷移する
Route::get('/income/recordincome', function () {
    return view('income/recordIncome');
});

// 所得の計上を完了させる
Route::post('/income/recordincomedone', 'IncomeController@postIncome');

// 計上した全ての所得を参照する
Route::get('/income/incomereference', 'IncomeController@incomeRef');

// 個別の所得を参照する
Route::get('income/individualincomereference/{id}', 'IncomeController@getIndividualSalary');

// 個別の所得を削除する
Route::get('income/incomedelete/{id}', 'IncomeController@IncomeDelete');

// 個別の所得を修正する際の所得を提示
Route::get('income/incomeedit/{id}', 'IncomeController@setRecordedSalary');

// 入力された金額を下に所得の修正計上を行う
Route::post('incomeedit/incomeeditdone', 'IncomeController@incomeEditExcute');


/*
* 個人PL出力関係のルーティング
*/

// 選択された年月に基づきPLを参照する
Route::post('outputpl/referencepl', 'OutputPLController@referencePL');


/*
* 稼働時間関係のルーティング
*/

// 稼働時間登録ページへのルーティング
Route::get('/workinghours/workinghoursrec', function () { return view('workingHours/workingHoursRec'); });

// 稼働時間登録処理のルーティング
Route::post('/workinghours/workinghoursrec', 'WorkingHoursController@workingHoursRecord');

// 稼働時間明細参照のルーティング
Route::get('/workinghours/workinghourslist', 'WorkingHoursController@workingHoursRef');

// 個別の稼働時間明細の参照
Route::get('/workinghours/individualhours/{id}', 'WorkingHoursController@IndividualHours');

// 個別の稼働時間明細を削除する
Route::get('/workinghours/workinghoursdelete/{id}', 'WorkingHoursController@workingHoursDelete');

// 個別の稼働時間明細を修正する
Route::get('/workinghours/workinghoursedit/{id}', 'WorkingHoursController@workingHoursEdit');

// 個別の稼働時間明細の修正処理
Route::post('/workinghours/workinghourseditdone', 'WorkingHoursController@workingHoursEditDone');


/*
 * 年月選択関係のルーティング 
*/

// PL出力
Route::get('outputpl/selectyearmonthpl', 'SelectYearMonthController@yearMonthSelectorForPl');

// 科目別の経費計上実績の参照
Route::get('/costaccountcontent/selectyearmonthcostaccount', 'SelectYearMonthController@yearMonthSelectorForBeforeFilter');

// CSV出力時
Route::get('/costcsv/selectyearmonthcsv', 'SelectYearMonthController@yearMonthSelectorForBeforewriteCsv');

// 経費計上実績の上位10位
Route::get('/costlist/toptencosts', 'SelectYearMonthController@yearMonthSelectorForTopTen');

// 経費計上リスト
Route::get('/costlist/selectyearmonthcostlist', 'SelectYearMonthController@yearMonthSelectorforCostlist');

// 円グラフ　月別の経費計上
Route::get('/costgraph/selectyearmonthpiechart', 'SelectYearMonthController@yearMonthSelectorForPieChart');

// 折れ線グラフ　当月内の日別の経費の計上推移(単月)
Route::get('/costgraph/selectyearmonthlinegraphdailycost', 'SelectYearMonthController@yearMonthSelectorForLineGraphDaily');

// 折れ線グラフ　当月内の日別の経費の計上推移(複数)
Route::get('/costgraph/selectyearmonthlinegraphdailycosts', 'SelectYearMonthController@yearMonthSelectorForLineGraphsDaily');

// 月別科目別の経費計上推移
Route::get('/costgraph/selectyearmonthlinegraphmonthaccount', 'SelectYearMonthController@yearMonthSelectorForLineGraphMonthAccount');


/*
 * 科目マスタ関係のルーティング 
*/


// 勘定科目登録画面へ遷移
Route::get('/accounts/recordaccounts', function () {
    return view('accounts/recordAccounts');
});

// 勘定科目登録を完了させる
Route::post('/accounts/recordaccountsdone', 'accountController@recordAccounts');

// 勘定科目一覧参照画面へ遷移
Route::get('/accounts/refaccounts', 'accountController@outputAccountsList');