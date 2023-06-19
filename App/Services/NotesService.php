<?php

namespace App\Services;

use App\Helpers\Session;
use App\Models\Note;
use App\Models\SharedNote;
use App\Validators\Base\BaseValidator;

class NotesService
{
    static public function create(BaseValidator $validator, array $fields = []): bool
    {
        if (!$validator->validate($fields)) {
            return false;
        }

        $sharedUsers = $fields['users'] ?? [];
        unset($fields['users']);

        $fields = static::prepareFields($fields);
        $noteId = Note::create($fields);

        if (!empty($sharedUsers)) {
            foreach ($sharedUsers as $userId) {
                SharedNote::create(['note_id' => $noteId, 'user_id' => $userId]);
            }
        }

        return $noteId;
    }

    static public function update(BaseValidator $validator, Note $note, array $fields = [])
    {
        if (!$validator->validate($fields)) {
            return false;
        }

        $sharedUsers = $fields['users'] ?? [];
        unset($fields['users']);

        $fields = static::prepareFields($fields);

        if ($note->update($fields)) {
            if (!empty($sharedUsers)) {
                $sharedNotes = SharedNote::select()
                    ->where('note_id', '=', $note->id)
                    ->whereNotIn('user_id', $sharedUsers)
                    ->get();

//                foreach ($sharedNotes as $sharedNote) {
//                    SharedNote::destroy(['note_id' => $noteId, 'user_id' => $userId]);
//                }

                foreach ($sharedUsers as $userId) {
                    SharedNote::create(['note_id' => $noteId, 'user_id' => $userId]);
                }
            }
        }

        return $noteId;
    }

    static public function destroy()
    {

    }

    static protected function prepareFields(array $fields): array
    {
        $fields['author_id'] = Session::id();
        $fields['pinned'] = $fields['pinned'] ?? 0;
        $fields['completed'] = $fields['completed'] ?? 0;

        return $fields;
    }
}
