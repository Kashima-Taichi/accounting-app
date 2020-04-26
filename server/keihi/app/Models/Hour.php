<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hour extends Model
{
    // 稼働時間計上用のバリデーション
    protected $guarded = array('id');

    // 稼働時間計上用のバリデーション
    public static $rules = [
        'year' => 'required|numeric',
        'month' => 'required|numeric',
        'fixedTime' => 'required|numeric',
        'overTime' => 'required|numeric',
    ];

    // 稼働時間修正用のバリデーション
    public static $rulesForEdit = [
        'fixedTime' => 'required|numeric',
        'overTime' => 'required|numeric',
    ];
}
