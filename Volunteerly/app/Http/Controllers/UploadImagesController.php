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
            Storage::copy('images/tmp/' . $temporaryImage->folder . '/' . $temporaryImage->file, 'images/' . $temporaryImage->folder . '/' . $temporaryImage->file);
            Image::create([
                
                'name' => $temporaryImage->file,
                'path' => $temporaryImage->folder . '/' . $temporaryImage->file
            ]);
            File::deleteDirectory('/images/tmp/' . $temporaryImage->folder);
            $temporaryImage->delete();
        }
        return redirect()->route('welcome'); 
    }
}
