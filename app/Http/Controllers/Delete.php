<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class Delete extends Controller
{
    public function delete(Request $request)
    {
        $entry = $request->id;

        DB::table('memo')->where('id',$entry)->delete();


    }
}
