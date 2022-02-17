<?php

/**
 * Абстрактная Фабрика (DataBaseFactory) объявляет набор методов работы с СУБД, которые возвращают
 * различные абстрактные значения.
 */
abstract class DataBaseFactory
{
    abstract public function dbConnection() : DBConnection;

    abstract public function dbRecord() : DBRecord;

    abstract public function dbQueryBuiler() : DBQueryBuiler;

    public function combineWorkWithDataBase()
    {
        $DBConnection = $this->dbConnection();
        $DBRecrord = $this->dbRecord();
        $DBQueryBuiler = $this->dbQueryBuiler();
    }
}

/**
 * Конкретная Фабрика производит семейство значений одной вариации для каждой СУБД.
 */
class MySQLFactory extends DataBaseFactory
{
    public function dbConnection() : DBConnection
    {
        return new MySQLConnection();
    }

    public function dbRecord() : DBRecord
    {
        return new MySQLRecord();
    }
    public function dbQueryBuiler(): DBQueryBuiler
    {
        return new MySQLQueryBuiler;
    }
}

/**
 * Каждая Конкретная Фабрика имеет соответствующую вариацию продукта.
 */
class PostgreSQLFactory extends DataBaseFactory
{
    public function dbConnection() : DBConnection
    {
        return new PostgreSQLConnection();
    }

    public function dbRecord() : DBRecord
    {
        return new PostgreSQLRecord();
    }
    public function dbQueryBuiler() : DBQueryBuiler
    {
        return new PostgreSQLQueryBuiler;
    }
}

class OracleFactory extends DataBaseFactory
{
    public function dbConnection() : DBConnection
    {
        return new OracleConnection();
    }

    public function dbRecord() : DBRecord
    {
        return new OracleRecord();
    }
    public function dbQueryBuiler() : DBQueryBuiler
    {
        return new OracleQueryBuiler;
    }
}

/**
 * Вариации соединений с БД СУБД .
 */
interface DBConnection { }

/**
 * Соединение с базой данных соответствующей СУБД.
 */
class MySQLConnection implements DBConnection
{
    public function mySQLConnection()
    {
        return "Соединение с базой данных СУБД MySQL";
    }
}

class PostgreSQLConnection implements DBConnection
{
    public function postgreSQLConnection()
    {
        return "Соединение с базой данных СУБД PostgreSQL";
    }
}

class OracleConnection implements DBConnection
{
    public function oracleConnection()
    {
        return "Соединение с базой данных СУБД Oracle";
    }
}

interface DBRecord { }

/**
 * Добавление данных в базу данных соответствующей СУБД.
 */
class MySQLRecord implements DBRecord
{
    public function mySQLRecord()
    {
        return "Запись в базу данных СУБД MySQL";
    }
}

class PostgreSQLRecord implements DBRecord
{
    public function postgreSQLRecord()
    {
        return "Запись в базу данных СУБД PostgreSQL";
    }
}

class OracleRecord implements DBRecord
{
    public function oracleRecord()
    {
        return "Запись в базу данных СУБД Oracle";
    }
}

interface DBQueryBuiler { }

/**
 * Запрос информации из базы данных соответствующей СУБД.
 */
class MySQLQueryBuiler implements DBQueryBuiler
{
    public function mySQLQueryBuiler()
    {
        return "Запрос из базы данных СУБД MySQL";
    }
}

class PostgreSQLQueryBuiler implements DBQueryBuiler
{
    public function postgreSQLQueryBuiler()
    {
        return "Запрос из базы данных СУБД PostgreSQL";
    }
}

class OracleQueryBuiler implements DBQueryBuiler
{
    public function oracleRQueryBuiler()
    {
        return "Запрос из базы данных СУБД Oracle";
    }
}

/**
 * Клиентский код.
 */
function clientCode(DataBaseFactory $factory)
{

    $dbConnection = $factory->dbConnection();
    $dbRecord = $factory->dbRecord();
    $dbQueryBuiler = $factory->dbQueryBuiler();

}

/**
 * Клиентский код работает с классом фабрики MySQLFactory.
 */
echo "Client: Testing client code with the MySQLFactory:\n";
clientCode(new MySQLFactory());

echo "\n";

/**
 * Клиентский код работает с классом фабрики PostgreSQLFactory.
 */

echo "Client: Testing the same client code with the PostgreSQLFactory:\n";
clientCode(new PostgreSQLFactory());

/**
 * Клиентский код работает с классом фабрики POracleFactory.
 */

echo "Client: Testing the same client code with the OracleFactory:\n";
clientCode(new OracleFactory());
