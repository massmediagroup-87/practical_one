<?php

namespace App\Http\Controllers;

use App\UserFile;
use App\Services\SaveFile;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\FileStoreRequest;

class UserFileController extends Controller
{
    /**
     * @var SaveFile
     */
    private $saveFile;

    public function __construct(SaveFile $saveFile)
    {

        $this->saveFile = $saveFile;
    }

    public function index()
    {
        $files = UserFile::where('user_id', Auth::id())->orderBy('created_at', 'desc')->paginate(20);
        return view('admin.files.index', ['files' => $files]);
    }

    public function create()
    {
        return view('admin.files.create');
    }

    public function store(FileStoreRequest $request)
    {
        $requestData = [
            'user_id' => Auth::id(),
            'comment' => $request->comment ?? '',
            'file' => $request->file('file')
        ];

        $this->saveFile->make($requestData);
        return redirect()->route('files.index');
    }

    public function show(UserFile $file)
    {
        $file_path = "{$file->user_id}_userFiles/$file->name";
        return view('admin.files.show', ['file' => $file, 'file_path' => $file_path]);
    }
}
