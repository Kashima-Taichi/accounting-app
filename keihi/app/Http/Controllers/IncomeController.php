<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Salary;
use DB;

class IncomeController extends Controller
{
    // 送信された所得の計上処理 model
    public function postIncome(Request $request) {
        // 年月重複計上チェック
        $fixedMonth = strlen($request->month) === 1 ? '0' . $request->month : $request->month;
        $concatYearMonth = $request->year . $fixedMonth;
        $salaries = Salary::all();
        $yearMonth = array();
        foreach ($salaries as $salary) {
            $yearMonth[] = $salary->yearMonth;
        }
        if (in_array($concatYearMonth, $yearMonth) === true) {
            return view('income.recordIncome', 
            ['notice' => 'ご入力されました年月は登録されております。']);
        }
        // バリデーション、データ登録のチェック
        $this->validate($request, Salary::$rules);
        $salary = new Salary;
        $formContents = $request->all();
        // 送信
        $formContents['yearMonth'] = $concatYearMonth;
        unset($formContents['_token']);
        $salary->fill($formContents)->save();
        return view('income.recordIncomeDone', ['recordedSalary' => $formContents]);
    }

    // 計上された所得の参照コントローラー model
    public function incomeRef() {
        $salaryData = Salary::all();
        return view('income.incomeReference', ['incomeData' => $salaryData]);
    }

    // 個別の所得参照ページで選択された所得の情報を取得してviewに渡す model
    public function setRecordedSalary($id) {
        $selectedSalary = Salary::where('id', $id)->first();
        return view('income.incomeEdit', ['selectedSalary' => $selectedSalary]);
    }

    // 全ての計上された所得の明細から個別の所得を取得しviewに渡す model
    public function getIndividualSalary($id) {
        $IndivudualSalary = Salary::where('id', $id)->first();
        return view('income.referenceIndividualIncome', ['IndivudualSalary' => $IndivudualSalary]);
    }

    // 計上された所得データの削除
    public function IncomeDelete($id) {
        $toBeDeletedData = Salary::find($id);
        Salary::destroy($id);
        return view('income.incomeDeleteDone', ['id' => $id]);
    }

    // 所得の修正処理の実行 model
    public function incomeEditExcute(Request $request) {
        $this->validate($request, Salary::$rules);
        $toBeEditedData = Salary::find($request->id);
        $editSalary = $request->all();
        unset($editSalary['_token']);
        $toBeEditedData->fill($editSalary)->save();
        return view('income.incomeEditDone');
    }
}
