<?php

namespace App\Controllers;

use App\Helpers\Session;
use App\Models\Folder;
use App\Models\Note;
use App\Models\SharedNote;
use App\Models\User;
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
        $users = User::select()->where('id', '!=', Session::id())->get();

        view('notes/create', ['folders' => Folder::getUserFolders(), 'users' => $users]);
    }
    public function store()
    {
        $fields = filter_input_array(INPUT_POST, NotesValidator::REQUEST_RULES, false);
        $validator = new NotesValidator();

        if (NotesService::create($validator, $fields)) {
            Session::notify('success', 'Note was created!');
            redirect("folders/{$fields['folder_id']}");
        }

        view('notes/create', $this->getErrors($fields, $validator));
    }

    public function edit(int $id)
    {
        $users = User::select()->where('id', '!=', Session::id())->get();
        $folders = Folder::getUserFolders();
        $sharedUsers = SharedNote::select(['user_id'])->where('note_id', '=', $id)->pluck('user_id');
        $note = Note::find($id);

        view('notes/edit', compact('users', 'folders', 'note', 'sharedUsers'));
    }

    public function update(int $id)
    {
        $fields = filter_input_array(INPUT_POST, NotesValidator::REQUEST_RULES, false);
        $validator = new NotesValidator();
        $note = Note::find($id);

        if (NotesService::update($validator, $note, $fields)) {
            Session::notify('success', 'Note was updated!');
            redirect("folders/{$fields['folder_id']}");
        }

        view('notes/edit', $this->getErrors($fields, $validator));
    }
    public function destroy(int $id) {}
}