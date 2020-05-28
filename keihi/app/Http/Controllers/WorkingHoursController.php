<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hour;

class WorkingHoursController extends Controller
{
    // 稼働時間の計上処理
    public function workingHoursRecord(Request $request) {
        // 年月重複計上チェック
        $fixedMonth = strlen($request->month) === 1 ? '0' . $request->month : $request->month;
        $concatYearMonth = $request->year . $fixedMonth;
        $allHours = Hour::all();
        $yearMonth = array();
        foreach ($allHours as $allHour) {
            $yearMonth[] = $allHour->yearMonth;
        }
        if (in_array($concatYearMonth, $yearMonth) === true) {
            return view('workingHours.workingHoursRec', 
            ['notice' => 'ご入力されました年月は登録されております。']);
        }
        // バリデーション 、データ登録のチェック
        $this->validate($request, Hour::$rules);
        $hour = new Hour;
        $hours = $request->all();
        $hours['yearMonth'] = $concatYearMonth;
        unset($hours['_token']);
        $hour->fill($hours)->save();
        return view('workingHours.workingHoursRec', ['msg' => '当月の稼働時間の計上が完了しました。']);
    }

    // 計上された稼働時間を参照する model
    public function workingHoursRef() {
        $workingHoursData = Hour::all();
        return view('workingHours.workingHoursList', ['attendanceData' => $workingHoursData]);
    }

    // 個別の稼働時間コンテンツページへ遷移 model
    public function IndividualHours($id) {
        $workingHoursContents = Hour::where('id', $id)->first();
        return view('workingHours.workingHoursIndividual', ['individualAttendance' => $workingHoursContents]);
    }

    // 個別の稼働時間明細を削除 model
    public function workingHoursDelete($id) {
        Hour::destroy($id);
        return view('workingHours.workingHoursDelete', ['id' => $id]);
    }

    // 稼働時間の修正ページへ遷移 model
    public function workingHoursEdit($id) {
        $workingHoursContents = Hour::where('id', $id)->first();
        return view('workingHours.workingHoursEdit', ['wantEditHours' => $workingHoursContents]);
    }

    // 稼働時間の修正処理 model
    public function workingHoursEditDone(Request $request) {
        $this->validate($request, Hour::$rulesForEdit);
        $toBeEditedData = Hour::find($request->id);
        $editHour = $request->all();
        unset($editHour['_token']);
        $toBeEditedData->fill($editHour)->save();
        return view('workingHours/workingHoursEditDone');
    }
}
