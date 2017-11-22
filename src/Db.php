<?php

class Db
{
    // singleton stuff, I guess
    protected static $connection;

    public function connect()
    {
        if (!isset(self::$connection)) {
            $config = parse_ini_file('../config/config.ini');
            self::$connection = new mysqli($config['host'], $config['user'], $config['password'], $config['dbname']);
        }

        if (self::$connection === false) {
            // we got a failure while connecting to DB
            echo "Unable to connect to DB";
            die("Cannot connect");
        }
        return self::$connection;
    }

    public function select($query)
    {
        $rows = array();
        $result = $this->query($query);
        if ($result === false) {
            return false;
        }
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function query($query)
    {
        $connection = $this->connect();
        $result = $connection->query($query);
        return $result;
    }

    public function query_prepared($sql)
    {
        $connection = $this->connect();
        $statement = $connection->prepare($sql);
        return $statement;
    }


}