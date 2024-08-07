<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function index(Request $request)
    {
        if ($request->hasFile('upload'))
        {
            $saved_img=$request->file('upload')->store('public/images/editor');
            $name = pathinfo($saved_img)['basename'];
            return response()->json([
                'url' => "/storage/images/editor/$name"
            ]);
        }
    }
}
