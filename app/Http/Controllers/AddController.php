<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Device;

class AddController extends Controller
{
    //
   /*  function add()
    {

        return ["Result"=>"data has been saved"];
    } */

    function add(Request $req)
    {
        $device = new Device;
        $device->name=$req->name;
        $device->member_id=$req->member_id;
        $result = $device->save();
        if($result)
        {
            return ["Result"=>"data has been saved"];
        }
        else
        {
            return ["Result"=>"operation has failed"];
        }
        
    }

}
