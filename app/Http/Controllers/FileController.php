<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class FileController extends Controller
{
    function downloadBackup($filename)
    {
        $path = storage_path('app/laravel/' . $filename);
        return response()->download($path);
    }
    function createBackup()
    {
        try {
            // Call the backup:run Artisan command
            Artisan::call('backup:run');

            return response()->json(['success' => 'Backup created successfully.'], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
