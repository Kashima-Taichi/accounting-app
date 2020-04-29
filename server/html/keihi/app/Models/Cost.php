<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
    // オートインクリメント
    protected $guarded = array('id');

    // 経費登録時のバリデーション
    public static $rules = array (
        'year' => 'required|integer',
        'month' => 'required|integer',
        'day' => 'required|integer',
        'price' => 'required|integer',
        'journal' => 'required|string',
    );
}
