<?php

namespace App\Services;

use App\UserFile;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileHandler
{
    private const DIRECTORY_PATH = 'files';

    public function save(int $userId, UploadedFile $getFile, ?string $comment, ?string $deletingDate): bool
    {
        $file = new UserFile();

        $file->user_id = $userId;
        $file->comment = $comment;
        $file->deleting_date = $deletingDate;

        $storeFile = $this->storeFile($getFile);
        $file->name = $this->getFileName($storeFile);

        return $file->save();
    }

    public function storeFile(UploadedFile $file): string
    {
        return $file->store(self::DIRECTORY_PATH);
    }

    public function getFileName(string $pathName): string
    {
        $name = substr($pathName, strlen(self::DIRECTORY_PATH) + 1);

        return $name;
    }

    public function getFilePath(string $fileName): string
    {
        return "storage/files/$fileName";
    }

    public function delete(UserFile $file): bool
    {
        $file->delete();

        return Storage::delete($this->getFilePath($file->name));
    }

    public function counterVisitors(UserFile $file): bool
    {
        ++$file->visitors;

        return $file->update();
    }
}
