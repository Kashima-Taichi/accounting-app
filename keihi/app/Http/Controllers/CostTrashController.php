<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trashed_cost;
use Log;
use DB;

class CostTrashController extends Controller
{
    // 経費のゴミ箱に入っているデータを参照するコントローラー
    public function referenceCosttrash() {
        $trashes = Trashed_cost::all();
        return view('costTrash.costTrashes', ['trashes' => $trashes]);
    }
}
