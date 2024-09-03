<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index(Request $request)
    {
        if ($request->hasFile('upload'))
        {
            $savedImg=$request->file('upload')->store('public/images/editor');
            $name = pathinfo($savedImg)['basename'];
            return response()->json([
                'url' => "/storage/images/editor/$name"
            ]);
        }
    }
}
