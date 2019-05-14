<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\interfac; 
use App\Log;
class logToDBController extends Controller implements Loger
{
    
    public function log($data){
        //dd("in");
        $log = new Log;
        $log->operation = $data["operation"];
        $log->comment = $data["comment"];
        $log->save();
    }
}
