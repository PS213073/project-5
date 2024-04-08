<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

trait FileUploadTrait
{
    function uploadImage(Request $request, $inputName, $oldPath = NULL, $path = '/images')
    {
        if ($request->hasFile($inputName)) {
            $image = $request->{$inputName};   //this will replace its value with current value
            $ext = $image->getClientOriginalExtension();
            $imageName = 'media_'.uniqid().'.'.$ext;

            $image->move(public_path($path), $imageName);

            // Delete previous file if exist
            if ($oldPath && File::exists(public_path($oldPath))) {
                File::delete(public_path($oldPath));
            }

            return $path.'/'.$imageName;
        }

        return NULL;
    }

    function removeImage(string $path){
        if (File::exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }
}
