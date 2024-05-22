<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\TemporaryImages;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UploadImagesController extends Controller
{
    public function index(Request $request)
    {

        return inertia('UploadImages/Index');
    }
    public function upload(Request $request)
    {
        $temporaryImages = TemporaryImages::whereIn('folder', $request->images)->get();
        foreach ($temporaryImages as $temporaryImage) {
            $path = $temporaryImage->folder . '/' . $temporaryImage->file;

            Storage::copy('images/tmp/' . $path, 'images/' . $path);
            Image::create([                
                'name' => $temporaryImage->file,
                'path' => $path
            ]);
            $path = 'images/tmp/' . $temporaryImage->folder;
            File::deleteDirectory($path);
            $temporaryImage->delete();            
    
        }
        return redirect()->route('welcome'); 
    }
}
