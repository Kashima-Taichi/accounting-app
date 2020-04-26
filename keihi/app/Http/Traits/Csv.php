<?php

namespace App\Http\Traits;

trait Csv {

    /**
     * CSVファイルを生成する
     * @param $filename
     */
    public static function createCsv($filename) {

        // 指定パスの生成
        $csv_file_path = storage_path('app/'.$filename);
        $result = fopen($csv_file_path, 'w');
        if ($result === false) {
            throw new Exception('ファイルの書き込みに失敗しました。');
        } else {
            // https://blog-s.xchange.jp/?p=404 ←　pack('C*', 0xEF, 0xBB, 0xBF)
            // https://doruby.jp/users/ueki/entries/BOM%E4%BB%98%E3%81%8DUTF-8%E3%81%A7%E6%96%87%E5%AD%97%E5%8C%96%E3%81%91%E3%81%97%E3%81%AA%E3%81%84CSV%E5%87%BA%E5%8A%9B
            fwrite($result, pack('C*', 0xEF, 0xBB, 0xBF));
        }
        fclose($result);

        return $csv_file_path;
    }

    /**
     * CSVファイルに書き出す
     * @param $filepath
     * @param $records
     */
    public static function write($filepath, $records) {

        // 書き出しのみでファイルをオープンする
        $result = fopen($filepath, 'a');

        // ファイルに書き出し
        fputcsv($result, $records);

        fclose($result);
    }

    /**
     * CSVファイルの削除
     * @param $filename
     */
    public static function purge($filename) {
        return unlink(storage_path('app/'.$filename));
    }
}