<?php

namespace App\helpers;


use Illuminate\Support\Facades\File;



/**
 * image upload
 *
 * @param object $file
 * @param string $path
 * @return string
 */


# Image Upload

function uploadImage($file, $path)
{
    $fileName = time() . '.' . $file->getClientOriginalExtension();
    $file->move(public_path('uploads/' . $path . '/'), $fileName);
    return "uploads/$path/" . $fileName;
}

# Delete Image

function deleteImage($image)
{

   if (File::exists($image)) {
      File::delete($image);
   }
}

