<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TimeController extends Controller
{
    public function get(){
        return response()->json(['status'=>'ok', 'timestamp'=>1542283200]);
    }

    public function change(){

    }
}
