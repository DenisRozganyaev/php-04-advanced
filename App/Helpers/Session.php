<?php

namespace App\Helpers;

class Session
{
    static public function check(): bool
    {
        return !empty($_SESSION['user_data']);
    }

    static public function id(): int|null
    {
        return $_SESSION['user_data']['id'] ?? null;
    }

    static public function setUserData($id, $options = [])
    {
        $options = array_merge(
            compact('id'),
            $options
        );

        $_SESSION['user_data'] = array_merge(
            $_SESSION['user_data'] ?? [],
            $options
        );
    }

    static public function destroy()
    {
        if (session_id()) {
            session_destroy();
        }
    }

    static public function notify(string $type, string $message)
    {
        $_SESSION['notify'] = compact('type', 'message');
    }

    static public function flushNotify()
    {
        unset($_SESSION['notify']);
    }
}
