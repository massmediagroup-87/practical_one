<?php

namespace App\Http\Controllers;

use App\UserFile;
use App\Services\FileHandler;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\FileStoreRequest;

class UserFileController extends Controller
{
    /**
     * @var SaveFile
     */
    private $saveFile;

    public function __construct(FileHandler $fileHandler)
    {
        $this->fileHandler = $fileHandler;
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
        $userId = Auth::id();
        $comment = $request->comment ?? '';
        $getFile = $request->file('file');
        $deletingDate = $request->deletingDate ?? '';

        $this->fileHandler->save(
            $userId,
            $getFile,
            $comment,
            $deletingDate
        );

        return redirect()->route('files.index');
    }

    public function show(UserFile $file)
    {
        $filePath = $this->fileHandler->getFilePath($file->name);
        return view('admin.files.show', ['file' => $file, 'filePath' => $filePath]);
    }

    public function destroy(UserFile $file)
    {
        $this->fileHandler->delete($file);
        return redirect()->route('files.index');
    }
}
