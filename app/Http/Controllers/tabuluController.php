<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Darbinieki;
use App\Pavadzime;
use App\Filiale;
use App\Kabineti;
use App\Mazvertigie;
use App\Pamatlidzekli;

use Log;

class tabuluController
{
    public function show(){

        return view('tabulas');
    }


    public function darbinieki(){
        $post = Darbinieki::get();

        return view('darbinieki')->with('post',$post);
    }
    public function darbiniekiINSERT(Request $request){

        $id = $request->id;
        $vards = $request->vards;
        $uzvards = $request->uzvards;
        $amats = $request->amats;
        $epasts = $request->epasts;
        $telefona_numurs = $request->telefona_numurs;

        $data=array("id"=>$id,"vards"=>$vards,"uzvards"=>$uzvards,"amats"=>$amats,"epasts"=>$epasts,"telefona_numurs"=>$telefona_numurs);
        Darbinieki::insert($data);
        return response()->json($vards);
    }
    public function darbiniekiEDIT($id){
        $post = Darbinieki::where('id',$id)->first();
        return view('darbiniekiEDIT')->with('post',$post);
    }
    public function darbiniekiEDIT2(Request $request){
        $id = $request->id;
        $vards = $request->vards;
        $uzvards = $request->uzvards;
        $amats = $request->amats;
        $epasts = $request->epasts;
        $telefona_numurs = $request->telefona_numurs;

        $data=array("id"=>$id,"vards"=>$vards,"uzvards"=>$uzvards,"amats"=>$amats,"epasts"=>$epasts,"telefona_numurs"=>$telefona_numurs);
        Darbinieki::where('id',$id)->update($data);
        return response()->json($vards);
    }
    public function darbiniekiDELETE(Request $request){
    $id = $request->id;
    Darbinieki::where('id',$id)->delete();

        return response()->json($id);
}



    public function filiales(){
        $post = Filiale::get();

        return view('filiales')->with('post',$post);
    }
    public function filialesINSERT(Request $request){

        $id = $request->id;
        $filiales_nosaukums = $request->filiales_nosaukums;
        $adrese = $request->adrese;


        $data=array("id"=>$id,"filiales_nosaukums"=>$filiales_nosaukums,"adrese"=>$adrese);
        Filiale::insert($data);
        return response()->json($filiales_nosaukums);
    }
    public function filialesEDIT($id){
        $post = Filiale::where('id',$id)->first();
        return view('filialesEDIT')->with('post',$post);
    }
    public function filialesEDIT2(Request $request){
        $id = $request->id;
        $filiales_nosaukums = $request->filiales_nosaukums;
        $adrese = $request->adrese;

        $data=array("id"=>$id,"filiales_nosaukums"=>$filiales_nosaukums,"adrese"=>$adrese);
        Filiale::where('id',$id)->update($data);
        return response()->json($filiales_nosaukums);
    }
    public function filialesDELETE(Request $request){
        $id = $request->id;
        Filiale::where('id',$id)->delete();

        return response()->json($id);
    }


//
//    public function filiales(){
//        $post = Filiale::get();
//
//        return view('filiales')->with('post',$post);
//    }

    public function kabineti(){
        $post = Kabineti::get();
        $filiales = Filiale::get();
//        Log::info($post);

        return view('kabineti')->with('post',$post)->with('filiales',$filiales);
    }
    public function kabinetiINSERT(Request $request){

        $filiales_nosaukums = Filiale::where('id',$request->filiales_id)->pluck('filiales_nosaukums');
        str_replace("\"","",$filiales_nosaukums);
        str_replace("[","",$filiales_nosaukums);
        str_replace("]","",$filiales_nosaukums);

//        Log::info($filiales_nosaukums[0]);
        $id = $request->id;
        $kabineta_nr = $request->kabineta_nr;


        $data=array("id"=>$id,"kabineta_nr"=>$kabineta_nr,"filiales_nosaukums"=>$filiales_nosaukums[0]);
        Kabineti::insert($data);
        return response()->json($kabineta_nr);
    }
    public function kabinetiEDIT($id){
        $post = Kabineti::where('id',$id)->first();
        $filiales = Filiale::get();

        return view('kabinetiEDIT')->with('post',$post)->with('filiales',$filiales);
    }
    public function kabinetiEDIT2(Request $request){
        if(is_numeric($request->filiales_id)){
            $filiales_nosaukums = Filiale::where('id',$request->filiales_id)->pluck('filiales_nosaukums');
            str_replace("\"","",$filiales_nosaukums);
            str_replace("[","",$filiales_nosaukums);
            str_replace("]","",$filiales_nosaukums);
//            Log::info($filiales_nosaukums);

        }else{
            $filiales_nosaukums = $request->filiales_id;
        }

        $id = $request->id;
        $kabineta_nr = $request->kabineta_nr;


        $data=array("id"=>$id,"kabineta_nr"=>$kabineta_nr,"filiales_nosaukums"=>$filiales_nosaukums[0]);
        Kabineti::where('id',$id)->update($data);
        return response()->json($kabineta_nr);
    }
    public function kabinetiDELETE(Request $request){
        $id = $request->id;
        Kabineti::where('id',$id)->delete();

        return response()->json($id);
    }




    public function mazvertigie_lidzekli(){
        $post = Mazvertigie::get();

        return view('mazvertigie_lidzekli')->with('post',$post);
    }
    public function mazvertigie_lidzekliINSERT(Request $request){

        $id = $request->id;
        $tipa_nr = $request->tipa_nr;
        $nosaukums= $request->nosaukums;


        $data=array("id"=>$id,"tipa_nr"=>$tipa_nr, "nosaukums"=>$nosaukums);
        Mazvertigie::insert($data);
        return response()->json($tipa_nr);
    }
    public function mazvertigie_lidzekliEDIT($id){
        $post = Mazvertigie::where('id',$id)->first();
        return view('mazvertigie_lidzekliEDIT')->with('post',$post);
    }
    public function mazvertigie_lidzekliEDIT2(Request $request){
        $id = $request->id;
        $tipa_nr = $request->tipa_nr;
        $nosaukums= $request->nosaukums;

        $data=array("id"=>$id,"tipa_nr"=>$tipa_nr, "nosaukums"=>$nosaukums);
        Mazvertigie::where('id',$id)->update($data);
        return response()->json($tipa_nr);
    }
    public function mazvertigie_lidzekliDELETE(Request $request){
        $id = $request->id;
        Mazvertigie::where('id',$id)->delete();

        return response()->json($id);
    }




    public function pamatlidzekli(){
        $post = Pamatlidzekli::get();

        return view('pamatlidzekli')->with('post',$post);
    }

    public function PamatlidzekliINSERT(Request $request){

        $id = $request->id;
        $nosaukums = $request->nosaukums;
        $nr= $request->nr;


        $data=array("id"=>$id,"nosaukums"=>$nosaukums, "nr"=>$nr);
        Pamatlidzekli::insert($data);
        return response()->json($nosaukums);
    }
    public function PamatlidzekliEDIT($id){
        $post = Pamatlidzekli::where('id',$id)->first();
        return view('PamatlidzekliEDIT')->with('post',$post);
    }
    public function PamatlidzekliEDIT2(Request $request){
        $id = $request->id;
        $nosaukums = $request->nosaukums;
        $nr= $request->nr;

        $data=array("id"=>$id,"nosaukums"=>$nosaukums, "nr"=>$nr);
        Pamatlidzekli::where('id',$id)->update($data);
        return response()->json($nosaukums);
    }
    public function PamatlidzekliDELETE(Request $request){
        $id = $request->id;
        Pamatlidzekli::where('id',$id)->delete();

        return response()->json($id);
    }


    public function pavadzime(){
        $post = Pavadzime::get();

        return view('pavadzime')->with('post',$post);
    }


}
