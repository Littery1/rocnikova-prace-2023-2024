<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemporaryImages;

class UploadTemporaryImagesController extends Controller
{
    public function upload(Request $request)
    {

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();
            $folder = uniqid('image-', true);
            $image->move(public_path('images/tmp/' . $folder), $fileName);
            
            TemporaryImages::create([
                'folder' => $folder,
                'file' => $fileName,
            ]);
            return $folder;
        }
        return '';
    }
}
