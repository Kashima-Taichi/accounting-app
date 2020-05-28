<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    // 所得計上用のバリデーション
    protected $guarded = array('id');

    // 所得計上時のバリデーション
    public static $rules = [
        'year' => 'integer|required|min:0',
        'month' => 'integer|required|min:1',
        'totalSalary' => 'integer|required|min:0',
        'basicSalary' => 'integer|required|min:0',
        'overtimePay' => 'integer|required|min:0',
        'healthInsurance' => 'integer|required|min:0',
        'employeePension' => 'integer|required|min:0',
        'employmentInsurance' => 'integer|required|min:0',
        'incomeTax' => 'integer|required|min:0',
        'otherDeduction' => 'integer|required|min:0',
        'totalDeduction' => 'integer|required|min:0',
        'netIncome' => 'integer|required|min:0',
    ];
}
