<?php

namespace App\Services;

use App\UserFile;
use Illuminate\Support\Facades\Storage;

class SaveFile
{
    public function make(array $request)
    {
        $file = new UserFile();
        $file->user_id = $request['user_id'];
        $file->comment = $request['comment'];

        $directory = $request['user_id'] . '_userFiles';
        $storagePath = Storage::url($directory);
        $file_path = Storage::url($request['file']->store($directory));
        $file_name = substr($file_path, strlen($storagePath) + 1);
        $file->name = $file_name;

        return $file->save();
    }
}
