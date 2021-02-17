<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Nguoidungs;
use Validator;
class NguoidungController extends Controller
{
    public function Swap($id){
        $nguoidung =Nguoidungs::find($id);
        $nguoidung->action = !$nguoidung->action;
        $nguoidung->save();    
        return response()->json($nguoidung,200);
    }
    
    public function NguoidungById($id){
        $nguoidung =Nguoidungs::find($id);
        if(is_null($nguoidung)){
            return response()->json(["messge"=>"Record not found"],404);
        }
        return response()->json($nguoidung,200);
    }

    public function Nguoidung(){
        return response()->json(Nguoidungs::get(),200);
    }

    
    public function NguoidungByTen(Request $request){
        $nguoidung =Nguoidungs::find($request);
        if(is_null($nguoidung)){
            return response()->json(["messge"=>"Record not found"],404);
        }
        return response()->json($nguoidung,200);
    }
    public function NguoidungSave(Request $request){
        $rule=['gmail'=>'required|email'];
        $validator=Validator::make($request->all(),$rule);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        $nguoidung = Nguoidungs::create($request->all());
        return response()->json($nguoidung,201);
    }
}