<?php

namespace App\Controllers;

use App\Helpers\Session;
use App\Models\Folder;
use App\Models\Note;
use App\Services\NotesService;
use App\Validators\FoldersValidator;
use App\Validators\NotesValidator;
use Core\Controller;

class NotesController extends Controller
{
    public function show(int $id)
    {
        view('notes/show', ['note' => Note::find($id)]);
    }
    public function create()
    {
        view('notes/create', ['folders' => Folder::getUserFolders()]);
    }
    public function store()
    {
        $fields = filter_input_array(INPUT_POST, $_POST);
        $validator = new NotesValidator();

        if (NotesService::create($validator, $fields)) {
            Session::notify('success', 'Note was created!');
            redirect("folders/{$fields['folder_id']}");
        }

        view('notes/create', $this->getErrors($fields, $validator));
    }

    public function edit(int $id)
    {
        d(__CLASS__);
        d(__METHOD__);
    }

    public function update(int $id) {}
    public function destroy(int $id) {}
}