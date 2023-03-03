<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Device;

use Validator;

class DeviceController extends Controller
{
    //Route parameters
    /* function list(){
        return Device::all();
    } */

    //video 4
    function list($id=null){
        return $id?Device::find($id):Device::all();
    }


    //Query parameters
    //getting names from the url as well
    function nameparams(){
        $name= request('name');
        $age= request('age');
        return[
            'name'=>$name,
            'age'=>$age
        ];
    }

    //update / put=> returns  static result
   /*  function update(){
        return ["result"=>"data is updated"];
    } */

    function update(Request $req)
    {
        $device = Device::find($req->id);
        $device->name=$req->name;
        $device->member_id=$req->member_id;
        $result= $device->save();

        if($result)
        {
            return ["result"=>"data is updated"];
        }
        else
        {
            return ["result"=>"update operation has been failed"];
        }
    }

    /* function delete($id)
    {
        return ["Result"=>"record has been deleted " .$id];
    } */

    function delete($id)
    {
        $device = Device::find($id);
        $result = $device->delete();
        if($result)
        {
            return["Result"=>"record has been deleted"];
        }
        else
        {
            return["Result"=>"delete operation failed"];
        }
    }

    //serach api method
    function search($name)
    {
        return Device::where("name","like","%".$name."%")->get();
    }

    //api validation method
    function testData(Request $req)
    {
        $rules = array(
           "member_id"=>"required|min:2|max:4"
        );
        $validator = Validator::make($req->all(),$rules);
        if($validator->fails())
        {
           /*  return $validator->errors(); */
           return response()->json($validator->errors(),401);
        }
        else{
            /* return ["x"=>"y"]; */
            //save to db
            $device = new Device;
            $device-> name =$req->name;
            $device->member_id=$req->member_id;
            $result=$device->save();
            if($result)
            {
                return ["Result"=>"Data has been saved"];
            }
            else
            {
                return["Result"=>"delete operation failed"];
            }
        }
       
    }
    
}
