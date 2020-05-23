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
}
