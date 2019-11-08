<?php

namespace App\Services;

use App\UserFile;
use Illuminate\Support\Facades\Auth;

class SaveFile
{
    public static function make($request)
    {
        $file = new UserFile();
        $file_name = rand() . '.' . $request->file('file')->getClientOriginalExtension();
        $file->name = $file_name;
        $file->user_id = Auth::id();
        $file->comment = $request->comment;
        $request->file('file')->move(public_path(Auth::id().'_userFiles'), $file_name);
        $file->save();
    }
}
