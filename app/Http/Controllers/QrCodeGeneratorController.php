<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPUnit\TextUI\XmlConfiguration\RenameBeStrictAboutCoversAnnotationAttribute;
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
    public function index()
    {
        $allQrCode = Link::orderBy('id', 'desc')->get();
        return view('qrlist', compact('allQrCode'));
    }

    public function update($shortened_url)
    {
        // dd($shortened_url);
        $link = Link::where('shortened_url', $shortened_url)->first();
        $sl = Str::random(6);
        $link->shortened_url = $sl;
        $qrCodes = QrCode::size(240)->generate($sl);
        $link->qrCode = $qrCodes;
        $link->save();

        return redirect()->back();


    }

    public function delete($shortened_url){

        $link = Link::where('shortened_url', $shortened_url)->first();
        $link->delete();
        return redirect()->back();
    }


    // api
    public function allQrCode(){

        $allQrCode = Link::orderBy('id', 'desc')->get();
        return response()->json($allQrCode);
    }
}
