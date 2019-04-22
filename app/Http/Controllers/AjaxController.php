<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AjaxController extends Controller
{
    public function insert(Request $request)
    {
       $name = $request->name;
       $surname = $request->surname;
       $mail = $request->mail;
       $telephone = $request->telephone;

       $status = 1;
       $error = "";

        if($request->name == '' || $request->surname == '' || $request->mail == '' || $request->telephone == '' )
        {
            $error .= "<span style='color:red;'>Not all fields are filled!</span>";
            $status = 0;
        }
        else
        {
            if(preg_match('/[^A-Za-z0-9]/',$request->name))
            {
                $error .= "<br><span style='color:red;'>Name contains illegal chars!</span><br>";
                $status = 0;
            }

            if(preg_match('/[^A-Za-z0-9]/',$request->surname))
            {
                $error .= "<br><span style='color:red;'>surname contains illegal chars!</span><br>";
                $status = 0;
            }

            if(!filter_var($mail,FILTER_VALIDATE_EMAIL))
            {
                $status = 0;
                $error .= "<br><span style='color:red;'>mail has illegal chars!</span><br>";
            }

            if(!filter_var($request->telephone,FILTER_VALIDATE_INT))
            {
                $status = 0;
                $error .= "<br><span style='color:red;'>Not Valid tel number!</span>";
            }
        }



        if($status == 1)
        {
            DB::table('memo')->insert(['name' => $name, 'surname' => $surname, 'mail' => $mail, 'telephone' => $telephone]);
            $response = "<br><span style='color:green;'>Data has been successfully saved!</span>";
        }
        elseif($status == 0)
        {
            $response = $error;
        }

        echo $response;





    }
}
