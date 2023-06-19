<?php

namespace App\Models;

use App\Helpers\Session;
use Core\Enums\SqlOrder;
use Core\Model;

class Note extends Model
{
    protected static string|null $tableName = 'notes';

    public int $author_id, $folder_id;

    public bool $pinned, $completed, $shared = false;

    public string $title, $content, $created_at, $updated_at, $author = '';

    static public function byFolder(int $folderId)
    {
        return static::selectWithSharedField()
            ->join('shared_notes sn', 'notes.id', 'sn.note_id')
            ->where('author_id', '=', Session::id())
            ->andWhere('folder_id', '=', $folderId)
            ->groupBy(['notes.id'])
            ->orderBy([
                'notes.pinned' => SqlOrder::DESC,
                'notes.completed' => SqlOrder::ASC,
                'notes.id' => SqlOrder::DESC
            ])
            ->get();
    }

    static public function sharedNotes()
    {
        return Note::select(['notes.*', 'us.email as author'])
            ->join('shared_notes sn', 'sn.note_id', 'notes.id')
            ->join('users us', 'notes.author_id', 'us.id')
            ->where('sn.user_id', '=', Session::id())
            ->orderBy(['notes.id' => SqlOrder::DESC])
            ->get();
    }

    static protected function selectWithSharedField(): Model
    {
        return Note::select([
            'notes.*',
            'IF(sn.note_id IS NULL, 0, 1) as shared'
        ]);
    }
}
