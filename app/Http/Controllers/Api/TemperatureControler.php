<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Temperature;
use Illuminate\Http\Request;

class TemperatureControler extends Controller
{
    //READ
    function getData(){
        $data=Temperature::all();
        return response()->json([
            "message" => "data temperature berhasil diambil",
            "data"    => $data
        ],200);
    }

    //CREATE
    function insertTemperature(Request $request){
        $value=$request->temperature;
        $temperature=Temperature::create([
            'value'=>$value
        ]);
        return response()->json([
            "message" => "data temperature berhasil ditambahkan",
            "data"    => $temperature
        ],201);
    }

    //DELETE
    function deleteData(Request $request){
        $value=$request->temperature;
        $temperature = Temperature::findOrFail($request->id);
        $temperature->delete();
        
        return response()->json([
            "message" => "Data temperature berhasil dihapus",
            "data"    => $temperature
        ], 200);
    }

    //UPDATE
    function putData(Request $request){
        $temperature = Temperature::findOrFail($request->id);
        $temperature->value = $request->value;
        $temperature->update(['temperature' => $request->temperature]);
        return response()->json([
            "message" => "Data temperature berhasil diupdate",
            "data"    => $temperature
        ], 200);
    }
}
