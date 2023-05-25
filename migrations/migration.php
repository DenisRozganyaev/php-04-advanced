<?php
use Config\Config;
use Core\Db;

require_once dirname(__DIR__) . '/Config/constants.php';
require_once BASE_DIR . '/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createUnsafeImmutable(BASE_DIR);
$dotenv->load();

class Migration
{
    const SCRIPTS_DIR = __DIR__ . '/scripts/';
    const MIGRATIONS_TABLE = '0_migrations';

    protected PDO $db;

    public function __construct()
    {
        $this->db = Db::connect();
        try {
            $this->db->beginTransaction();

            // check migration table

            // run all migration

            $this->db->commit();
        } catch (PDOException $exception) {
            $this->db->rollBack();
            d($exception->getMessage(), $exception->getTrace());
        }
    }
} new Migration();
