<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\TemporaryImages;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UploadImagesController extends Controller
{
    public function index(Request $request)
    {

        return inertia('UploadImages/Index');
    }

    public function upload(Request $request, Event $event)
    {
        // Fetch the temporary images based on the folders provided in the request
        $temporaryImages = $request->images ? TemporaryImages::whereIn('folder', $request->images)->get() : [];

        foreach ($temporaryImages as $temporaryImage) {
            // Define the permanent directory and paths
            $folder = 'images/perm/' . Auth::id() . '/' . $event->id . '/' . $request->type;
            $directory = public_path($folder);
            $path = $directory . '/' . $temporaryImage->file;
            $tempPath = public_path('images/tmp/' . $temporaryImage->folder . '/' . $temporaryImage->file);

            // Create the directory if it doesn't exist
            if (!File::isDirectory($directory)) {
                File::makeDirectory($directory, 0755, true, true);
            }

            // Copy the file from temporary to permanent location
            if (File::exists($tempPath)) {
                File::copy($tempPath, $path);
            }

            // Create a new image entry in the database
            Image::create([
                'name' => $temporaryImage->file,
                'path' => $path,
                'events_id' => $event->id,
                'type' => $request->type,
            ]);

            // Delete the temporary directory and its contents
            $tmpDir = public_path('images/tmp/' . $temporaryImage->folder);
            File::deleteDirectory($tmpDir);

            // Delete the temporary image entry from the database
            $temporaryImage->delete();
        }

        return back();
    }

}
