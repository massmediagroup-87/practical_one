<?php

namespace App\Http\Controllers;

use App\TempLink;
use App\Services\TokenService;

class TempLinkController extends Controller
{
    private $tokenService;

    public function __construct(TokenService $tokenService)
    {
        $this->tokenService = $tokenService;
    }

    public function index()
    {
        $links = TempLink::orderBy('created_at', 'desc')->get();

        return view('admin.links.temporary', ['links' => $links]);
    }

    public function show(string $temp)
    {
        $token = TempLink::where('token', $temp)->where('active', true)->first();

        if ( $token === null ) {
            abort(404);
        }

        $this->tokenService->disable($token);

        return view('admin.files.image', ['file' => $token->file]);
    }

    public function destroy(TempLink $temp)
    {
        $temp->delete();

        return redirect()->back();
    }
}
