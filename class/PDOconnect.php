<?php

class PDOconnect {
    //define static var $pdoODB is null
    private static ?PDO $pdoOBJ = null;
    //define dsn(PDO-argument)in a string who can modify with Config.Object
    private static string $dsn = "mysql:host=%s;dbname=%s;charset=%s";

    //creat a function to connect with a Database.
    /**
     * @return PDO
     */
    public static function connect ():PDO {
        //if use a first time, don't use a any call.
        if (self::$pdoOBJ === null ) {
            try {
                $dsn = sprintf(self::$dsn, Config::DB_SRV, Config::DB_NAME, Config::DB_CHARSET);
                self::$pdoOBJ = new PDO($dsn, Config::DB_USERNAME, Config::DB_PASSWORD);
                //define a ATTR error mode
                self::$pdoOBJ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            //let's die if a error in a connection run.
            catch (PDOException $err) {
                die();
            }
        }
        return self::$pdoOBJ;
    }

}