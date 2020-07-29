<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bonus;
use Log;

class BonusController extends Controller
{
    // 賞与の計上機能
    public function record(Request $request) {
        $bonus = new Bonus;
        $formContents = $request->all();
        unset($formContents['_token']);
        $bonus->fill($formContents)->save();
        return view('bonus.recordBonusDone', ['recordedBonus' => $formContents]);
    }

    // 計上された賞与の参照
    public function getListBonusData() {
        $bonusData = Bonus::all();
        return view('bonus.bonusReference', ['bonusData' => $bonusData]);
    }
}
