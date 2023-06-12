<?php

namespace App\Models;

use Core\Model;

class Folder extends Model
{
    protected static string|null $tableName = 'folders';

    public int $author_id;
    public string $title, $created_at, $updated_at;
}
