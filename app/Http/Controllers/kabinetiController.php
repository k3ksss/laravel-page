<?php

namespace App\Http\Controllers;

use App\Post;

class kabinetiController
{
    public function show(){
//        $post = \DB::table('inventars')->where('Nosaukums', 'galdi')->first();
//
//        dd($post);

        return view('kabinetis');
    }
    public function add(){


        return view('add');
    }
    public function fetchData($kods){
        $post = \DB::table('inventars')->where('nr', $kods)->first();
        //$post = \DB::table('inventars')->where('Nosaukums', 'galdi')->first();

       // dd($post);

        return response()->json($post);
    }
}
