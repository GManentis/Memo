<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ViewMemo extends Controller
{
    public function Page($id)
    {
        if(!is_int($id) &&  $id <= 1)
        {
            (int)$skippable = 0;
            $id = 1;
        }
        else
        {
            (int)$skippable = $id*10 - 10;
        }

        $countEntries = DB::table('memo')->count();
        $getdata_RSLT = DB::table('memo')->orderBy('id','desc')->limit(10)->skip($skippable)->get();

        if($countEntries > 0)
        {
            $response = "<table class='table tbl-striped'>";
            foreach($getdata_RSLT as $result)
            {
                $response .= "<tr><td>".$result->name."</td><td>".$result->surname."</td><td>".$result->mail."</td><td>".$result->telephone."</td><td><button class='btn btn-danger' onclick='DeleteEntry(\"$result->id\")'>Delete entry</button></td></tr>";
            }
            $response .= "</table>";

            $pages_temp = $countEntries/10;

           if(is_float($pages_temp))
           {
                $pages_temp = floor($pages_temp) + 1;
           }

           $pages = "<ul class='pagination'>";

           for($i=1 ; $i <= $pages_temp ; $i++)
           {
               if($i == $id)
               {
                    $pages .= "<li class='active'><a href='/manage/".$i."'>".$i."</li>";
               }
               else
               {
                    $pages .= "<li><a href='/manage/".$i."'>".$i."</li>";
               }
           }

            $pages .= "</ul>";

        }
        else
        {
            $response = "No data available";
            $pages = "";
        }


        return view('memo', ['response'=>$response,'pages'=>$pages]);

    }
}
