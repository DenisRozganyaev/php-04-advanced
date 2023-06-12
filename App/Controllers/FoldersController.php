<?php

namespace App\Controllers;

use App\Helpers\Session;
use App\Models\Folder;
use App\Models\Note;
use App\Services\AuthService;
use App\Validators\Auth\LoginValidator;
use App\Validators\FoldersValidator;

class FoldersController extends \Core\Controller
{
    public function index()
    {
        $notes = Note::select()
            ->where('author_id', '=', Session::id())
            ->andWhere('folder_id', '=', 1)
            ->get();

        $folders = Folder::all();
        $activeFolder = 1;

        view('pages/dashboard', compact('notes', 'folders', 'activeFolder'));
    }

    public function show(int $id)
    {
        $notes = Note::select()
            ->where('author_id', '=', Session::id())
            ->andWhere('folder_id', '=', $id)
            ->get();
        $folders = Folder::all();
        $activeFolder = $id;

        view('pages/dashboard', compact('notes', 'folders', 'activeFolder'));
    }

    public function create()
    {
        view('folders/create');
    }

    public function store()
    {
        $fields = filter_input_array(INPUT_POST, $_POST);
        $validator = new FoldersValidator();

        if ($validator->validate($fields) && $folderId = Folder::create(array_merge($fields, ['author_id' => Session::id()]))) {
            redirect("folders/{$folderId}");
        }

        view('auth/login', $this->getErrors($fields, $validator));
    }

    public function before(string $action): bool
    {
        if (!Session::check()) {
            redirect('login');
        }

        return parent::before($action);
    }
}