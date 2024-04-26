<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\HtmlString;

class QrCodeGeneratorController extends Controller
{
    //
    public function create(Request $request)
    {
        $url = $request->input('url');
        $qrCodes = QrCode::size(240)->generate($url);
        // return view("welcome", $qrCodes);
        $jsonString = $qrCodes->__toString();

        // dd($jsonString);
        return response()->json(['success' => 'true', 'qrCode' => $jsonString, 'url' => $url] );
    }

}
