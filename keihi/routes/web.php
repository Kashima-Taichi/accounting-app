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

// 経費関係のメニューへ遷移
Route::get('/tops/costtop', function () {
    return view('tops/costTop');
});

// 時間関係のメニューへ遷移
Route::get('/tops/hourtop', function () {
    return view('tops/hourTop');
});

// 所得関係のメニューへ遷移
Route::get('/tops/incometop', function () {
    return view('tops/incomeTop');
});

// グラフ参照関係のメニューへ遷移
Route::get('/tops/graphtop', function () {
    return view('tops/graphTop');
});

// pl参照関係のメニューへ遷移
Route::get('/tops/pltop', function () {
    return view('tops/plTop');
});

// 特殊機能のメニューへ遷移
Route::get('/tops/specialtop', function () {
    return view('tops/specialTop');
});

// 科目設定関係のメニューへ遷移させる
Route::get('/tops/settingstop', function () {
    return view('tops/settingsTop');
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

// カレンダー参照機能
Route::post('costlist/getcalender', 'CostListController@getCalendar');

// 5日ごとの経費計上合計金額を参照する機能
Route::get('costlist/getperdays', 'CostListController@getCostAmountPerDays');

// 科目別の経費明細の内容を出力
Route::post('/costaccountcontent/costaccountcontent', 'CostListController@outPutAccountContent');


/*
* CSV出力関係のルーティング
*/

// 年月選択ページで年月を選択後に、CSVファイルの書き込みを実行する
Route::post('/costcsv/writecsv', 'CsvController@CostCsv');

// 年月選択ページで年月を選択後に、CSVファイルの書き込みを実行する
Route::post('/plcsv/writecsv', 'CsvController@plCsv');

/*
* グラフ出力関係のルーティング
*/

// 年月選択後に円グラフを出力する
Route::post('/costgraph/outputpiechart', 'GraphController@createPiechart');

// 過去60日間以上の経費計上実績を参照する
Route::post('/costgraph/outputlinegraphdailycostpast', 'GraphController@createLineGraphPast');

// 年月選択後に日別の経費計上合計額推移折れ線グラフを出力する 単月
Route::post('/costgraph/outputlinegraphdailycostamount', 'GraphController@createLineGraphDailyAmount');

// 年月選択後に日別の経費計上合計額推移折れ線グラフを出力する 複数月
Route::post('/costgraph/outputlinegraphdailycostamounts', 'GraphController@createLineGraphDailyAmounts');

// 年月選択後に折れ線グラフを出力する 単月
Route::post('/costgraph/outputlinegraphdailycost', 'GraphController@createLineGraph');

// 年月選択後に折れ線グラフを出力する 複数月
Route::post('/costgraph/outputlinegraphdailycosts', 'GraphController@createLineGraphs');

// 勘定科目選択後に折れ線グラフを出力する
Route::post('/costgraph/outputlinegraphMonthAccount', 'GraphController@createLineGraphAccountMonth');

// 所得の計上推移を出力する
Route::get('incomegraph', 'GraphController@createLineGraphIncome');

// 稼働時間の計上推移を出力する
Route::get('hoursgraph', 'GraphController@createLineGraphHours');


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

// 選択された年月に基づきPLを参照する　単月
Route::post('outputpl/referencepl', 'OutputPLController@referencePL');

// 選択された年月に基づきPLを参照する　複数月
Route::post('outputpl/referencepls', 'OutputPLController@referencePL');

// 選択された年月に基づきPLを参照する　四半期
Route::post('/outputpl/referencequarterpl', 'OutputPLController@referenceQuarterPLs');


/*
* 稼働時間関係のルーティング
*/

// 稼働時間登録ページへのルーティング
Route::get('/workinghours/workinghoursrec', function () {
    return view('workingHours/workingHoursRec');
});

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

// PL出力(複数月分)
Route::get('outputpl/selectyearmonthpls', 'SelectYearMonthController@yearMonthSelectorForPls');

// PL出力(複数月分)
Route::get('outputpl/selectyearmonthquarterpl', 'SelectYearMonthController@yearMonthSelectorForQuarterPl');

// 科目別の経費計上実績の参照
Route::get('/costaccountcontent/selectyearmonthcostaccount', 'SelectYearMonthController@yearMonthSelectorForBeforeFilter');

// CSV出力時 月別経費出力
Route::get('/costcsv/selectyearmonthcsv', 'SelectYearMonthController@yearMonthSelectorForBeforewriteCostCsv');

// CSV出力時 PL出力
Route::get('/plcsv/selectyearmonthcsv', 'SelectYearMonthController@yearMonthSelectorForBeforewritePlCsv');

// 経費計上実績の上位10位
Route::get('/costlist/toptencosts', 'SelectYearMonthController@yearMonthSelectorForTopTen');

// 経費計上リスト
Route::get('/costlist/selectyearmonthcostlist', 'SelectYearMonthController@yearMonthSelectorforCostlist');

// 円グラフ　月別の経費計上
Route::get('/costgraph/selectyearmonthpiechart', 'SelectYearMonthController@yearMonthSelectorForPieChart');

// 折れ線グラフ　当月内の日別の経費の計上合計額推移(単月)
Route::get('/costgraph/selectyearmonthlinegraphcostamount', 'SelectYearMonthController@yearMonthSelectorForLineGraphDailyAmount');

// 折れ線グラフ　当月内の日別の経費の計上合計額推移(複数月)
Route::get('/costgraph/selectyearmonthlinegraphcostamounts', 'SelectYearMonthController@yearMonthSelectorForLineGraphDailyAmounts');

// 折れ線グラフ　当月内の日別の経費の計上推移(単月)
Route::get('/costgraph/selectyearmonthlinegraphdailycost', 'SelectYearMonthController@yearMonthSelectorForLineGraphDaily');

// 折れ線グラフ　当月内の日別の経費の計上推移(複数)
Route::get('/costgraph/selectyearmonthlinegraphdailycosts', 'SelectYearMonthController@yearMonthSelectorForLineGraphsDaily');

// 折れ線グラフ　過去60日以上の計上実績
Route::get('/costgraph/selectyearmonthlinegraphpastcosts', function () {
    return view('selectYearMonth.selectYearMonth', [
        'title' => '過去60日以上の経費計上実績の参照', 'h2' => '過去60日以上の経費計上実績の参照',
        'action' => '/costgraph/outputlinegraphdailycostpast', 'inputVal' => '指定した条件に基づいて折れ線グラフを参照する'
    ]);
});

// 月別科目別の経費計上推移
Route::get('/costgraph/selectyearmonthlinegraphmonthaccount', 'SelectYearMonthController@yearMonthSelectorForLineGraphMonthAccount');

// 経費計上カレンダー
Route::get('costlist/calender', 'SelectYearMonthController@yearMonthSelectorforCalender');


/*
 * 設定関係のルーティング 
*/

/* 勘定科目の設定 */

// 勘定科目登録画面へ遷移
Route::get('/accounts/recordaccounts', function () {
    return view('config/recordAccounts');
});

// 勘定科目登録を完了させる
Route::post('/accounts/recordaccountsdone', 'AccountController@recordAccounts');

// 勘定科目一覧参照画面へ遷移
Route::get('/accounts/refaccounts', 'AccountController@outputAccountsList');

// データベースのデータをダンプする方法を紹介するページへ遷移
Route::get('/dump', 'ConfigController@dumpDatabase');


/*
 * ゴミ箱関係のルーティング 
*/

// ゴミ箱参照ページへのルーティング
Route::get('costtrash/refconsttrash', 'CostTrashController@referenceCosttrash');
