<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Logger;
class logToFileController extends Controller implements Loger
{
    public function log($data){
        
        $data = implode("|",$data);
        $data = $data . "\n";
        $fp = fopen('log.txt', 'w');
        fwrite($fp, $data);
        fclose($fp);

    }
}
