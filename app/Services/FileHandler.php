<?php


namespace App\Services;

use App\UserFile;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class FileHandler
{
    public function save(int $userId, UploadedFile $getFile, string $comment): bool
    {
        $file = new UserFile();
        $file->user_id = $userId;
        $file->comment = $comment;
        $pathName = $this->storeFile($getFile);
        $file->name = $this->getFileName($pathName);
        return $file->save();
    }

    public function storeFile($file): string
    {
        return $file->store($this->directoryPath());
    }

    public function getFileName(string $pathName): string
    {
        $name = substr($pathName, strlen($this->directoryPath()) + 1);
        return $name;
    }

    public function getFilePath(string $fileName): string
    {
        return "files/$fileName";
    }

    private function directoryPath(): string
    {
        return 'files';
    }

    public function delete(UserFile $file): bool
    {
        $file->delete();
        return Storage::delete($this->getFilePath($file->name));
    }
}
