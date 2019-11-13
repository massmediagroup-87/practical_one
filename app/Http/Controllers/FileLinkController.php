<?php

namespace App\Http\Controllers;

use App\Services\FileHandler;
use App\UserFile;

class FileLinkController extends Controller
{
    private $fileHandler;

    public function __construct(FileHandler $fileHandler)
    {
        $this->fileHandler = $fileHandler;
    }

    public function __invoke(UserFile $file)
    {
        $this->fileHandler->counterVisitors($file);
        $file->path = $this->fileHandler->getFilePath($file->name);

        return view('admin.files.image', ['file' => $file]);
    }
}
