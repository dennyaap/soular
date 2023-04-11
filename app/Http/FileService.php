<?php

namespace App\Http;
use Illuminate\Support\Facades\Storage;


class FileService {
    public static function upload($file, $dir='/', $default='') {
        if ($file != null) {
            $path = $file->store($dir, 'public');
        }
        else {
            $path = $default;
        }

        // return pathinfo() $path;
        return pathinfo($path, PATHINFO_BASENAME);
    }

    public static function delete($file, $dir) {
        $path = $dir . pathinfo($file, PATHINFO_BASENAME);
        
        if(Storage::exists($path)) {
            return Storage::delete($path);
        }
        return False;
    }

    public static function update($file, $newFile, $dir) {
        $oldPath = $dir . pathinfo($file, PATHINFO_BASENAME);

        if ($newFile) {
            self::delete($file, $oldPath);

            $newPath = self::upload($newFile, $dir);

            return $newPath;
        }

        return False;
    }
}