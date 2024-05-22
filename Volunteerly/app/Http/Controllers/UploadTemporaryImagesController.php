<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemporaryImages;
use Illuminate\Support\Facades\Auth;

class UploadTemporaryImagesController extends Controller
{
    public function upload(Request $request)
    {

        if($request->hasFile('image')) {
            $image = $request->file('image');
            $currentDateTime = now()->format('Ymd_His');
            $fileName = $currentDateTime . '_' . $image->getClientOriginalName();
            $folder = Auth::id();
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
