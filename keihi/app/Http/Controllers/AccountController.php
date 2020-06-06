<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use DB;
use Log;

class AccountController extends Controller
{

    public function recordAccounts(Request $request) {
        // バリデーション、データの登録
        $this->validate($request, Account::$rules);
        $account = new Account;
        $formContents = $request->all();
        // 送信
        unset($formContents['_token']);
        $account->fill($formContents)->save();
        return view('accounts/recordAccounts', ['msg' => '正しく勘定科目の登録が行われました！続けて経費の計上を行うことが可能です。']);
    }

    public function outputAccountsList() {
        $accountsData = Account::paginate(13);
        return view('accounts/refAccounts', ['accountsData' => $accountsData]);
    }
}
