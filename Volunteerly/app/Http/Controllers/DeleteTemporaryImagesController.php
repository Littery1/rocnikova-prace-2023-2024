<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TemporaryImages;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Redirect;

class DeleteTemporaryImagesController extends Controller
{
    public function delete(Request $request)
    {   
        $temporaryImage = TemporaryImages::where('folder', $request->folder)->first();

        if ($temporaryImage) {
            $path = public_path('images/tmp/' . $temporaryImage->folder);

            File::deleteDirectory($path);
            $temporaryImage->delete();
        }

        return Redirect::back();
        }
}
