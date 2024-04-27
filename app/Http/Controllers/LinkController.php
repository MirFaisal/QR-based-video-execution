<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;
use Str;

class LinkController extends Controller
{
    //
    public function index(){
        return view();
    }

    public function create(Request $request){

        $link = new Link();
        $link->original_url = $request->input('url');
        $link->shortened_url = Str::random(6);
        $link->qrCode = $request->input('qrCode');
        $link->save();

        return response()->json(['shortened_url' => url($link->shortened_url)]);
    }

    public function edit($id){
        
    }
    public function update(Request $request, $id){

    }

    public function delete($id)
    {
    }
}
