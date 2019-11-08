<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ReportUserFilesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('admin.files.report', ['users' => User::get()]);
    }
}
