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

// 特殊機能のメニューへ飛ばす
Route::get('/tops/specialtop', function () {
    return view('tops/specialTop');
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

// 全ての計上された経費明細を取得
Route::get('/costlist/costpaginate', 'CostListController@costspaginate');

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
Route::post('/costgraph/outputlinegraph', 'GraphController@createLineGraph');


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

// PL出力の際の年月選択ページへのルーティング
Route::get('outputpl/selectyearmonth', 'SelectYearMonthController@selectYearMonth');

// 年月選択ページへ遷移
Route::get('/costaccountcontent/selectyearmonth', 'SelectYearMonthController@selectYearMonthBeforeFilter');

//CSVファイルを出力する際の年月を選択する
Route::get('/costcsv/selectyearmonth', 'SelectYearMonthController@selectYearMonthBeforewriteCsv');

// 計上された経費のトップ10位を見る前の年月選択ページ
Route::get('/costlist/toptencosts', 'SelectYearMonthController@yearMonthSelectorForTopTen');

// 経費明細の参照前の年月選択のページへ遷移する
Route::get('/costlist/selectyearmonth', 'SelectYearMonthController@yearMonthSelector');

// 円グラフ参照前の年月選択のページへ遷移する
Route::get('/costgraph/selectyearmonthpiechart', 'SelectYearMonthController@yearMonthSelectorForPieChart');

// 折れ線グラフ参照前の年月選択のページへ遷移する
Route::get('/costgraph/selectyearmonthlinegraph', 'SelectYearMonthController@yearMonthSelectorForLineGraph');