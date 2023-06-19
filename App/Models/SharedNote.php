<?php

namespace App\Models;

use Core\Model;

class SharedNote extends Model
{
    protected static string|null $tableName = 'shared_notes';

    public int $note_id, $user_id;
}
