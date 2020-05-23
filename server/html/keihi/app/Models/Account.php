<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    // オートインクリメント
    protected $guarded = array('id');

    // 科目登録時のバリデーション
    public static $rules = [
        'accountAlpha' => 'required',
        'accountKanji' => 'required',
    ];

    // 勘定科目のセレクトボックス用のリストを取得
    public static function accountsList() {
        $accounts = Account::all();
        $list = array();
        foreach ($accounts as $account) {
            $list += array($account->accountKanji => $account->accountKanji);
        }
        return $list;
    }
}
