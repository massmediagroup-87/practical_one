<?php

namespace App\Http\Controllers;

use App\UserFile;
use App\Services\FileHandler;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\FileStoreRequest;

class UserFileController extends Controller
{

    private $fileHandler;

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
        $comment = $request->get('comment');
        $file = $request->file('file');
        $deletingDate = $request->get('deletingDate');

        $this->fileHandler->save(
            $userId,
            $file,
            $comment,
            $deletingDate
        );

        return redirect()->route('files.index');
    }

    public function show(UserFile $file)
    {
        $this->fileHandler->counterVisitors($file);
        $file->path = $this->fileHandler->getFilePath($file->name);

        return view('admin.files.show', ['file' => $file]);
    }

    public function destroy(UserFile $file)
    {
        $this->fileHandler->delete($file);

        return redirect()->route('files.index');
    }

}
