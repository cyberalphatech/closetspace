<?php

namespace App\Helpers;

use Storage;
use Config;

class FileHelper
{

    public function storageFile($file, $path = null)
    {
        $fileName = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
        $driver = Config::get('filesystems.default');
        if (!empty($path)) {
            $fileName = $path.'/'. $fileName;
        }
        $t = Storage::disk($driver)->put($fileName, file_get_contents($file), 'public');
        $fileName = Storage::disk($driver)->url($fileName);
        return $fileName;
    } 
}