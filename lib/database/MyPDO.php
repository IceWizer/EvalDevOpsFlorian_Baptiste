<?php

/**
 * Description of Student
 *
 * @author Florian
 */

namespace myPdo
{
    abstract class MyPDO
    {
        private static $databaseName = 'mysql:dbname=cityData;host=localhost';
        private static $databaseUser = 'root';
        private static $databasePassword = 'Not24get';

        public static function select($sql, $parameters = null): \PDOStatement
        {
            $database = new \PDO(self::$databaseName, self::$databaseUser, self::$databasePassword);

            $sth = $database->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
            $sth->execute($parameters);

            return $sth;
        }

        public static function insertDelete($sql, $parameters = null)
        {
            $database = new \PDO(self::$databaseName, self::$databaseUser, self::$databasePassword);

            $sth = $database->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
            $sth->execute($parameters);
        }
    }
}
