<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Baiviets;
use App\Categories;
use Validator;
class BaivietsController extends Controller
{
    
    public function Baiviet(){
        return response()->json(Baiviets::get(),200);
    }
    public function Random(){
        $baiviet=Baiviets::all()->random(1)->first();
        if(is_null($baiviet)){
            return response()->json(["messge"=>"Record not found"],404);
        }
        return response()->json($baiviet,200);
    }
    public function BaivietByCategory($id){
        $baiviet=Baiviets::where('category_id',$id)->get();
        if(is_null($baiviet)){
            return response()->json(["messge"=>"Record not found"],404);
        }
        return response()->json($baiviet,200);
    }
    public function BaivietById($id){
        $baiviet=Baiviets::find($id);
        if(is_null($baiviet)){
            return response()->json(["messge"=>"Record not found"],404);
        }
        return response()->json($baiviet,200);
    }
    public function BaivietSave(Request $request){
        $rule=['ten'=>'required|min:3'];
        $validator=Validator::make($request->all(),$rule);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        $baiviet = Baiviets::create($request->all());
        return response()->json($baiviet,201);
    }
    public function BaivietUpdate(Request $request,$id){
        $baiviet=Baiviets::find($id);
        if(is_null($category)){                                                                          
            return response()->json(["messge"=>"Record not found"],404);
        }
        $baiviet->update($request->all());
        return response()->json($baiviet,200);
    }
    public function BaivietDelete(Request $request,$id){
        $baiviet=Baiviets::find($id);
        if(is_null($baiviet)){                                                                          
            return response()->json(["messge"=>"Record not found"],404);
        }
        $baiviet->delete();
        return response()->json(null,204);
    }
    
}