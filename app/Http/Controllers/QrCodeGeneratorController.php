<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\HtmlString;
use App\Models\Link;
use Str;

class QrCodeGeneratorController extends Controller
{
    //
    public function create(Request $request)
    {
        $url = $request->input('url');
        $sl = Str::random(6);
        $link = new Link();
        $link->original_url = $url;
        $link->shortened_url = $sl;
        $qrCodes = QrCode::size(240)->generate($sl);
        $link->qrCode = $qrCodes;
        $link->save();

        // return view("welcome", $qrCodes);
        $jsonString = $qrCodes->__toString();

        // dd($jsonString);
        return response()->json(['success' => 'true', 'qrCode' => $jsonString, 'url' => $url]);
    }
    public function index(){
        $allQrCode = Link::orderBy('id', 'desc')->get();
        return view('qrlist', compact('allQrCode'));
    }
}
