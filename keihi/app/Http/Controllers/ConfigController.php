<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfigController extends Controller
{
    // DBのダンプをする方法
    public function dumpDatabase() {
        $dataBase = env('DB_DATABASE', 'SAISAN');
        $userName = env('DB_USERNAME', 'TAICHI');
        $passWord = env('DB_PASSWORD', 'secret');
        $hostName = 'localhost';
        $execDir = '/usr/bin/mysqldump';
        $destinationDir = '/var/lib/mysql/dump.sql';
        $enterContainer = 'docker exec -it local_db bash';
        $sqlStatement = "{$execDir} --user={$userName} --password={$passWord} --host={$hostName} {$dataBase} > {$destinationDir}";
        return view ('config.sqlDump', ['sqlStatement' => $sqlStatement, 'enterContainer' => $enterContainer]);
    }
}
