<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Vungmiens;
use Validator;
class VungmiensController extends Controller
{
    
    public function Vungmiens(){
        return response()->json(Vungmiens::get(),200);
    }
    public function VungmiensById($id){
        $vungmiens =Vungmiens::find($id);
        if(is_null($vungmiens)){
            return response()->json(["messge"=>"Record not found"],404);
        }
        return response()->json($vungmiens,200);
    }
    public function VungmiensSave(Request $request){
        $rule=['title'=>'required|min:3'];
        $validator=Validator::make($request->all(),$rule);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        $vungmiens = Vungmiens::create($request->all());
        return response()->json($vungmiens,201);
    }
    public function VungmiensUpdate(Request $request,$id){
        $vungmiens=Vungmiens::find($id);
        if(is_null($vungmiens)){                                                                          
            return response()->json(["messge"=>"Record not found"],404);
        }
        $vungmiens->update($request->all());
        return response()->json($vungmiens,200);
    }
    public function VungmiensDelete(Request $request,$id){
        $vungmiens=Category::find($id);
        if(is_null($vungmiens)){                                                                          
            return response()->json(["messge"=>"Record not found"],404);
        }
        $vungmiens->delete();
        return response()->json(null,204);
    }
    
}