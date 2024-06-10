<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ImageController extends Controller
{
    public function destroy(Image $image)
    {
        $image->delete();
        return Redirect::back();
    }
  
}
