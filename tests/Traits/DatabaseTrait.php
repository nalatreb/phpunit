<?php

namespace Traits;

use PDO;

trait DatabaseTrait
{
    protected static ?PDO $dbConnection;

    /**
     * @beforeClass
     */
    public static function createDatabase(): void
    {
        if (isset(self::$dbConnection)) {
            return;
        }

        self::$dbConnection = new PDO('sqlite:database.db');
    }

    /**
     * @afterClass
     */
    public static function deleteDatabase(): void
    {
        self::$dbConnection = null;
        unlink('database.db');
    }
}
