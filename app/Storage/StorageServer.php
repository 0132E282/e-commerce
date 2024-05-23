<?php

namespace App\storage;

use Illuminate\Support\Facades\Storage;

class StorageServer
{
    function exists()
    {
        return Storage::exists();
    }
    function uploadImage($file, $path, $option = [])
    {
        if ($file?->isValid()) {
            $fileImage =  $file->store('public/' . $path);
            $urlImage = Storage::url($fileImage);
            return $urlImage;
        }
        return '';
    }

    function uploadImageMultiple($files, $path, $option = []): array
    {
        $filePath = [];
        if (is_array($files) && count($files) > 0) {
            foreach ($files as $file) {
                $filePath[] = $this->uploadImage($file, $path, $option);
            }
        }
        return $filePath;
    }
    function getPathServe($path)
    {
        return asset($path);
    }
    static function deletePath($path)
    {
        $pathCurrent = str_replace('/storage', 'public', $path);
        if (!empty($pathCurrent) && Storage::exists($pathCurrent)) {
            return Storage::delete($pathCurrent);
        }
        return false;
    }
}
