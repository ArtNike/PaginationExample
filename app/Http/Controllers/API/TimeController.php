<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TimeController extends Controller
{
    /**
     * @SWG\Get(
     *        path="/timestamp",
     *        tags={"time"},
     *        operationId="getProjectStartsTime",
     *        summary="Get time of project starting in timestamp(UTC)",
     *        produces={"application/json"},
     * 		@SWG\Response(
     *            description="success",
     *            response=200,
     *        ),
     *    )
     */
    public function get(){
        return response()->json(['status'=>true, 'timestamp'=>1542283200]);
    }

    public function change(){

    }
}
