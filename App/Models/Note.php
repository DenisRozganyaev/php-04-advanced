<?php

namespace App\Models;

use App\Helpers\Session;
use Core\Enums\SqlOrder;
use Core\Model;

class Note extends Model
{
    protected static string|null $tableName = 'notes';

    public int $author_id, $folder_id;

    public bool $pinned, $completed;

    public string $title, $content, $created_at, $updated_at;

    static public function byFolder(int $folderId)
    {
        return Note::select()
            ->where('author_id', '=', Session::id())
            ->andWhere('folder_id', '=', $folderId)
            ->orderBy('id', SqlOrder::DESC)
            ->get();
    }
}
