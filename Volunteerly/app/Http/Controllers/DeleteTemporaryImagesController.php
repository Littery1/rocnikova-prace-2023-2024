<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemporaryImages;
use Illuminate\Support\Facades\File;

class DeleteTemporaryImagesController extends Controller
{
    public function delete(Request $request)
    {
        $temporaryImage = TemporaryImages::where('folder', $request->folder)->first();
        if ($temporaryImage) {
            File::deleteDirectory('images/tmp/' . $temporaryImage->folder);
            $temporaryImage->delete();
        }
        return '';
    }
}
