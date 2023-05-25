<?php

use Config\Config;

require_once dirname(__DIR__) . '/Config/constants.php';
require_once BASE_DIR . '/vendor/autoload.php';

try {
    if (!session_id()) {
        session_start();
    }

    $dotenv = Dotenv\Dotenv::createUnsafeImmutable(BASE_DIR);
    $dotenv->load();

    \Core\Db::connect();

} catch (PDOException $exception) {
    dd("PDOException", $exception->getMessage());
} catch (Exception $exception) {
    dd("Exception", $exception->getMessage());
}