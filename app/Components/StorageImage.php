<?php

namespace App\Components;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class StorageImage
{


    static function uploadImage($file, $path, $width = 400, $height = 400)
    {
        $uploadFile = 'public/uploads/images/' . $path;
        $fileImage =  $file->store($uploadFile);
        $urlImage = Storage::url($fileImage);
        $image = Image::make(public_path($urlImage));
        $image->resize($width, $height);
        $image->save();
        return asset($urlImage);
    }

    static function deleteImagePath($data, $name)
    {
        $imagePath = null;
        if (isset($data->$name)) {
            $value = $data->$name ? $data->$name : 'src';
            $relativePath = ltrim(parse_url($value, PHP_URL_PATH), '/storage');
            if (Storage::disk('public')->exists($relativePath)) {
                $imagePath = $relativePath;
            }
        } else {
            if (count($data) > 0) {
                foreach ($data as $vale) {
                    $relativePath = ltrim(parse_url($vale->$name, PHP_URL_PATH), '/storage');
                    if (Storage::disk('public')->exists($relativePath)) {
                        $imagePath[] = $relativePath;
                    }
                }
            }
        }
        if (isset($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }
        return ['data' =>  $data, 'file' =>  $imagePath];
    }
}
