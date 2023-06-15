<?php

namespace App\Models;

use App\Helpers\Session;
use Core\Model;

class Folder extends Model
{
    protected static string|null $tableName = 'folders';

    const GENERAL_FOLDER_ID = 1;

    public int $author_id;
    public string $title, $created_at, $updated_at;

    static public function isGeneral(int $id): bool
    {
        return $id === static::GENERAL_FOLDER_ID;
    }

    static public function getUserFolders(): array
    {
        return static::select()
            ->where('author_id', '=', Session::id())
            ->orWhere('id', '=', static::GENERAL_FOLDER_ID)
            ->orderBy('id')
            ->get();
    }
}
