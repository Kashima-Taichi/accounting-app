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

    /**
     * 年月日に基づいて対応する経費データを返却する
     *
     * @param $year 年データ
     * @param $month 月データ
     * @param $day 日データ
     * @return object 経費計上データ
     */
    public static function getCostData(string $year, string $month, string $day = null): object
    {
        // 日のデータがあるかないかでデータ取得処理を分岐する
        if ($day === 'select' || $day === null) {
            $costLists = Cost::whereRaw('year = ? and month = ?', array($year, $month))->get();
        } else {
            $costLists = Cost::whereRaw('year = ? and month = ? and day = ?', array($year, $month, $day))->get();
        }
        // 経費計上データの返却
        return $costLists;
    }

    /**
     * 年月日に基づいて対応する経費計上合計金額データを返却する
     *
     * @param $year 年データ
     * @param $month 月データ
     * @param $day 日データ
     * @return string 経費計上合計金額データ
     */
    public static function getCostAmountData(string $year, string $month, string $day = null): string
    {
        // 日のデータがあるかないかでデータ取得処理を分岐する
        if ($day === 'select' || $day === null) {
            $costAmounts = Cost::whereRaw('year = ? and month = ?', array($year, $month))->sum('price');
        } else {
            $costAmounts = Cost::whereRaw('year = ? and month = ? and day = ?', array($year, $month, $day))->sum('price');
        }
        // 経費計上合計金額データの返却
        return $costAmounts;
    }
}
