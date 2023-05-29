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

            $this->createMigrationTable();
            $this->runAllMigrations();

            if ($this->db->inTransaction()) {
                $this->db->commit();
            }
        } catch (PDOException $exception) {
            d($exception->getMessage(), $exception->getTrace());
            if ($this->db->inTransaction()) {
                $this->db->rollBack();
            }
        }
    }

    protected function createMigrationTable()
    {
        d('----- Prepare migration table query -----');
        $sql = file_get_contents(static::SCRIPTS_DIR . static::MIGRATIONS_TABLE . '.sql');
        $query = $this->db->prepare($sql);

        $result = match($query->execute()) {
            true => '- Migration table was created (or already exists)',
            false => '- Failed'
        };

        d($result);
        d('----- Finished migration table query -----');
    }

    protected function runAllMigrations()
    {
        d('----- Fetching migrations -----');

        $migrations = scandir(static::SCRIPTS_DIR);
        $migrations = array_values(array_diff(
            $migrations,
            ['.', '..', static::MIGRATIONS_TABLE . '.sql']
        ));

        foreach($migrations as $migration) {
            $table = preg_replace('/[\d]+_/i', '', $migration);

            if (! $this->checkIfMigrationWasRun($migration)) {
                d("- Run [{$table}] ...");
                $sql = file_get_contents(static::SCRIPTS_DIR . $migration);
                $query = $this->db->prepare($sql);

                if ($query->execute()) {
                    $this->logMigration($migration);
                    d("- [{$table}] - DONE!");
                }
            } else {
                d("- [{$table}] - SKIPPED!");
            }
        }
        d('----- Fetching migrations - DONE! -----');
    }

    /**
     * Write migration name to migrations table.
     * @param string $migration
     * @return void
     */
    protected function logMigration(string $migration): void
    {
        $query = $this->db->prepare("INSERT INTO migrations (name) VALUES (:name)");
        $query->bindParam('name', $migration);
        $query->execute();
    }

    protected function checkIfMigrationWasRun(string $migration): bool
    {
        $query = $this->db->prepare("SELECT * FROM migrations WHERE name = :name");
        $query->bindParam('name', $migration);
        $query->execute();

        return (bool) $query->fetch();
    }
} new Migration();
