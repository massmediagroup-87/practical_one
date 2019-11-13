<?php

namespace App\Http\Controllers;

use App\Services\TokenService;
use App\UserFile;

class TempStoreController extends Controller
{
    private $tokenService;

    public function __construct(TokenService $tokenService)
    {
        $this->tokenService = $tokenService;
    }

    public function __invoke(UserFile $file)
    {
        $this->tokenService->save($file);

        return redirect()->route('temp.index');
    }
}
