<?php

namespace App\Services;

use App\TempLink;
use App\UserFile;

class TokenService
{
    private $fileHandler;

    public function __construct(FileHandler $fileHandler)
    {
        $this->fileHandler = $fileHandler;
    }

    public function save(UserFile $file): bool
    {
        $link = new TempLink();
        $link->token = $this->generate();
        $link->file_id = $file->id;

        return $link->save();
    }

    public function disable(TempLink $token): bool
    {
        $token->file->path = $this->fileHandler->getFilePath($token->file->name);

        return $token->update(['active' => false]);
    }

    private function generate(): string
    {
        return sha1(rand() . time());
    }
}
