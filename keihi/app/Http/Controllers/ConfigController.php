<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfigController extends Controller
{
    // 
    public function dumpDatabase() {
        $dataBase = env('DB_DATABASE', false);
        $userName = env('DB_USERNAME', false);
        $passWord = env('DB_PASSWORD', false);
        $hostName = 'localhost';
        $execDir = '/usr/bin/mysqldump';
        $destinationDir = '/var/lib/mysql/dump.sql';
        $enterContainer = 
        $sqlStatement = "{$execDir} --user={$userName} --password={$passWord} --host={$hostName} {$dataBase} > {$destinationDir}";
        return view ('config.sqlDump', ['sqlStatement' => $sqlStatement]);
    }
}
