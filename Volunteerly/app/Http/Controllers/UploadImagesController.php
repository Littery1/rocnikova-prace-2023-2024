<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Event;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Models\TemporaryImages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UploadImagesController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('UploadImages/Index');
    }

    public function upload(Request $request, Event $event)
    {
        $temporaryImages = $request->images ? TemporaryImages::whereIn('folder', $request->images)->get() : [];

        foreach ($temporaryImages as $temporaryImage) {
            $folder = 'images/perm/' . Auth::id() . '/' . $event->id . '/' . $request->type;
            $directory = public_path($folder);
            $path = $directory . '/' . $temporaryImage->file;
            $tempPath = public_path('images/tmp/' . $temporaryImage->folder . '/' . $temporaryImage->file);

            if (!File::isDirectory($directory)) {
                File::makeDirectory($directory, 0755, true, true);
            }

            if (File::exists($tempPath)) {
                File::copy($tempPath, $path);
            }

            Image::create([
                'name' => $temporaryImage->file,
                'path' => $path,
                'events_id' => $event->id,
                'type' => $request->type,
            ]);

            $tmpDir = public_path('images/tmp/' . $temporaryImage->folder);
            File::deleteDirectory($tmpDir);

            $temporaryImage->delete();
        }

        return redirect()->back();
    }
}
