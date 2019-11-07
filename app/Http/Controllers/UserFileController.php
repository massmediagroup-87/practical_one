<?php

namespace App\Http\Controllers;

use App\UserFile;
use App\Services\SaveFile;
use Illuminate\Http\Request;

class UserFileController extends Controller
{
    public function index()
    {
        return view('admin.files.index', ['files' => UserFile::paginate(20)]);
    }

    public function create()
    {
        return view('admin.files.create');
    }

    public function store(Request $request)
    {
        SaveFile::make($request);
        return redirect()->route('files.index');
    }
}
